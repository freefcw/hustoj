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

    /**
     * Get user lang from session
     *
     * @param array $lang_supported language supported
     *
     * @return string language got from session or NULL
     */
    private static function get_user_lang($lang_supported) {
        // Get session language, TODO: use user settings instead
        $session = Session::instance();
        $lang_current = $session->get('lang');
        return in_array($lang_current, $lang_supported) ? $lang_current : NULL;
    }

    /**
     * Set user lang to session
     *
     * @param string $lang_current language to set
     */
    private static function set_user_lang($lang_current) {
        // Set session default, TODO: user instead
        $session = Session::instance();
        $session->set('lang', $lang_current);
    }

    /**
     * Get user lang from Accepted-Language
     *
     * @param array $lang_supported language supported
     *
     * @return string language got from Accepted-Language or NULL
     */
    private static function get_browser_lang($lang_supported) {
        // Get lang from Request::accept_lang().
        $lang_current = NULL;
        foreach (Request::accept_lang() as $key => $val)
        {
            if (in_array($key, $lang_supported))
            {
                $lang_current = $key;
                break;
            }
        }
        return $lang_current;
    }

    /**
     * Initialize internationalization
     * for current request
     */
    public static function init_i18n() {
        // Get language config variables
        $lang_settings = Kohana::$config->load('multilang')->get('languages', array());
        $lang_supported = array_keys($lang_settings['supported']);

        // Get language
        $lang_current = self::get_user_lang($lang_supported);
        if (! $lang_current) $lang_current = self::get_browser_lang($lang_supported);
        if (! $lang_current) $lang_current = $lang_settings['default'];

        // Set user language
        self::set_user_lang($lang_current);

        // Set request language and locale
        $lang_config = $lang_settings['supported'][$lang_current];
        if (i18n::lang() != $lang_config['code']) {
            i18n::lang($lang_config['code']);
            setlocale(LC_ALL, $lang_config['locale']);
        }
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
