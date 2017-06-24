<?php

class Filter
{
    private $allowed_protocols = array(), $allowed_tags = array();
    
    public function addAllowedProtocols($protocols)
    {
        $this->allowed_protocols = (array)$protocols;
    }
    
    public function addAllowedTags($tags)
    {
        $this->allowed_tags = (array)$tags;
    }
    
    public function xss($string)
    {
        // Only operate on valid UTF-8 strings. This is necessary to prevent cross
        // site scripting issues on Internet Explorer 6.
        if (!$this->isUtf8($string)) {
            return '';
        }
        
        // Remove NULL characters (ignored by some browsers).
        $string = str_replace(chr(0), '', $string);
        
        // Remove Netscape 4 JS entities.
        $string = preg_replace('%&\s*\{[^}]*(\}\s*;?|$)%', '', $string);
        
        // Defuse all HTML entities.
        $string = str_replace('&', '&amp;', $string);
        
        // Change back only well-formed entities in our whitelist:
        // Decimal numeric entities.
        $string = preg_replace('/&amp;#([0-9]+;)/', '&#\1', $string);
        
        // Hexadecimal numeric entities.
        $string = preg_replace('/&amp;#[Xx]0*((?:[0-9A-Fa-f]{2})+;)/', '&#x\1', $string);
        
        // Named entities.
        $string = preg_replace('/&amp;([A-Za-z][A-Za-z0-9]*;)/', '&\1', $string);
        
        return preg_replace_callback('%
            (
            <(?=[^a-zA-Z!/])  # a lone <
            |                 # or
            <!--.*?-->        # a comment
            |                 # or
            <[^>]*(>|$)       # a string that starts with a <, up until the > or the end of the string
            |                 # or
            >                 # just a >
            )%x', array($this, 'split'), $string);
    }
    
    private function isUtf8($string)
    {
        if (strlen($string) == 0) {
            return true;
        }
        
        return (preg_match('/^./us', $string) == 1);
    }
    
    private function split($m)
    { 
        $string = $m[1];
        
        if (substr($string, 0, 1) != '<') {
            // We matched a lone ">" character.
            return '&gt;';
        } elseif (strlen($string) == 1) {
            // We matched a lone "<" character.
            return '&lt;';
        }
        
        if (!preg_match('%^<\s*(/\s*)?([a-zA-Z0-9\-]+)([^>]*)>?|(<!--.*?-->)$%', $string, $matches)) {
            // Seriously malformed.
            return '';
        }
        
        $slash = trim($matches[1]);
        $elem = &$matches[2];
        $attrlist = &$matches[3];
        $comment = &$matches[4];
        
        if ($comment) {
            $elem = '!--';
        }
        
        if (!in_array(strtolower($elem), $this->allowed_tags, true)) {
            // Disallowed HTML element.
            return '';
        }
        
        if ($comment) {
            return $comment;
        }
        
        if ($slash != '') {
            return "</$elem>";
        }
        
        // Is there a closing XHTML slash at the end of the attributes?
        $attrlist = preg_replace('%(\s?)/\s*$%', '\1', $attrlist, -1, $count);
        $xhtml_slash = $count ? ' /' : '';
        
        // Clean up attributes.
        $attr2 = implode(' ', $this->attributes($attrlist));
        $attr2 = preg_replace('/[<>]/', '', $attr2);
        $attr2 = strlen($attr2) ? ' ' . $attr2 : '';
        
        return "<$elem$attr2$xhtml_slash>";
    }
    
    private function attributes($attr) {
        
        $attrarr = array();
        $mode = 0;
        $attrname = '';
        
        while (strlen($attr) != 0) {
            // Was the last operation successful?
            $working = 0;
            
            switch ($mode) {
                case 0:
                    // Attribute name, href for instance.
                    if (preg_match('/^([-a-zA-Z]+)/', $attr, $match)) {
                        $attrname = strtolower($match[1]);
                        $skip = ($attrname == 'style' || substr($attrname, 0, 2) == 'on');
                        $working = $mode = 1;
                        $attr = preg_replace('/^[-a-zA-Z]+/', '', $attr);
                    }
                    break;
                case 1:
                    // Equals sign or valueless ("selected").
                    if (preg_match('/^\s*=\s*/', $attr)) {
                        $working = 1;
                        $mode = 2;
                        $attr = preg_replace('/^\s*=\s*/', '', $attr);
                        break;
                    }
                    
                    if (preg_match('/^\s+/', $attr)) {
                        $working = 1;
                        $mode = 0;
                        
                        if (!$skip) {
                            $attrarr[] = $attrname;
                        }
                        
                        $attr = preg_replace('/^\s+/', '', $attr);
                    }
                    break;
                case 2:
                    // Attribute value, a URL after href= for instance.
                    if (preg_match('/^"([^"]*)"(\s+|$)/', $attr, $match)) {
                        $thisval = $this->badProtocol($match[1]);
                        
                        if (!$skip) {
                            $attrarr[] = "$attrname=\"$thisval\"";
                        }
                        
                        $working = 1;
                        $mode = 0;
                        $attr = preg_replace('/^"[^"]*"(\s+|$)/', '', $attr);
                        break;
                    }
                    
                    if (preg_match("/^'([^']*)'(\s+|$)/", $attr, $match)) {
                        $thisval = $this->badProtocol($match[1]);
                        
                        if (!$skip) {
                            $attrarr[] = "$attrname='$thisval'";
                        }
                        
                        $working = 1;
                        $mode = 0;
                        $attr = preg_replace("/^'[^']*'(\s+|$)/", '', $attr);
                        break;
                    }
                    
                    if (preg_match("%^([^\s\"']+)(\s+|$)%", $attr, $match)) {
                        $thisval = $this->badProtocol($match[1]);
                        
                        if (!$skip) {
                            $attrarr[] = "$attrname=\"$thisval\"";
                        }
                        
                        $working = 1;
                        $mode = 0;
                        $attr = preg_replace("%^[^\s\"']+(\s+|$)%", '', $attr);
                    }
                break;
            }
            
            if ($working == 0) {
                // Not well formed; remove and try again.
                $attr = preg_replace('/
                ^
                (
                "[^"]*("|$)     # - a string that starts with a double quote, up until the next double quote or the end of the string
                |               # or
                \'[^\']*(\'|$)| # - a string that starts with a quote, up until the next quote or the end of the string
                |               # or
                \S              # - a non-whitespace character
                )*              # any number of the above three
                \s*             # any number of whitespaces
                /x', '', $attr);
                
                $mode = 0;
            }
        }
        
        // The attribute list ends with a valueless attribute like "selected".
        if ($mode == 1 && !$skip) {
            $attrarr[] = $attrname;
        }
        
        return $attrarr;
    }
    
    private function badProtocol($string) {
        
        $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
        return htmlspecialchars($this->stripDangerousProtocols($string), ENT_QUOTES, 'UTF-8');
    }
    
    private function stripDangerousProtocols($uri)
    {
        
        // Iteratively remove any invalid protocol found.
        do {
            $before = $uri;
            $colonpos = strpos($uri, ':');
            
            if ($colonpos > 0) {
                // We found a colon, possibly a protocol. Verify.
                $protocol = substr($uri, 0, $colonpos);
                
                // If a colon is preceded by a slash, question mark or hash, it cannot
                // possibly be part of the URL scheme. This must be a relative URL, which
                // inherits the (safe) protocol of the base document.
                if (preg_match('![/?#]!', $protocol)) {
                    break;
                }
                
                // Check if this is a disallowed protocol. Per RFC2616, section 3.2.3
                // (URI Comparison) scheme comparison must be case-insensitive.
                if (!in_array(strtolower($protocol), $this->allowed_protocols, true)) {
                    $uri = substr($uri, $colonpos + 1);
                }
            }
        } while ($before != $uri);
        
        return $uri;
    } 
}