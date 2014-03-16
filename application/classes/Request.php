<?php defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {
    /**
     * Get user lang from session
     * 
     * @param array $lang_supported
     *
     * @return string language
     */
    private static function get_user_lang($lang_supported) {
        // Get session language, TODO: use user settings instead
        $session = Session::instance();
        $lang_current = $session->get('lang');
        return in_array($lang_current, $lang_supported) ? $lang_current : NULL;
    }

    /**
     * Get user lang from session
     * 
     * @param string $lang_current
     */
    private static function set_user_lang($lang_current) {
        // Set session default, TODO: user instead
        $session = Session::instance();
        $session->set('lang', $lang_current);
    }

    /**
     * Get user lang from Accepted-Language
     * 
     * @param array $lang_supported
     *
     * @return string language
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
     */
    private static function init_i18n() {
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

    /**
     * Extend the factory method to force the presence of the lang identifier.
     *
     * @return  Request
     */
    public static function factory($uri = TRUE, $client_params = array(), $allow_external = TRUE, $injected_routes = array())
    {
        $instance = parent::factory($uri, $client_params, $allow_external, $injected_routes);
        self::init_i18n();
        return $instance;
    }
}
