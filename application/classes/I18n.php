<?php defined('SYSPATH') OR die('No direct script access.');

class I18n extends Kohana_I18n {
    /**
     * @param string $text text to translate
     * @param string $lang
     *
     * @return  string
     */
    public static function get($text, $lang = NULL)
    {
        if ( !$lang )
        {
            $lang = I18n::$lang;
        }
        $table       = I18n::load($lang);
        $alternative = I18n::load('en-us');

        return isset($table[$text]) ? $table[$text] :
            (isset($alternative[$text]) ? $alternative[$text] : $text);
    }
}

/**
 * @uses     I18n::get
 *
 * @param text  $string
 * @param array $values $array to replace in the translated text
 * @param       string  text to translate
 *
 * @return  string
 */
function __($string, array $values = NULL, $source = NULL)
{
    $string = I18n::get($string);

    return empty($values) ? $string : strtr($string, $values);
}
