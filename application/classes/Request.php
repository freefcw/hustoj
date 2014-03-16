<?php defined('SYSPATH') OR die('No direct script access.');

class Request extends Kohana_Request {
    /**
     * Extend the instance method to force the presence of the lang identifier.
     *
     * Creates a new request object for the given URI.
     *
     * @return  Request
     */
    public static function factory($uri = TRUE, $client_params = array(), $allow_external = TRUE, $injected_routes = array())
    {
        $instance = parent::factory($uri, $client_params, $allow_external, $injected_routes);

        $lang_settings = Kohana::$config->load('multilang')->get('languages', array());

        // Get language config variables
        $lang_default = $lang_settings['default'];
        $lang_supported = array_keys($lang_settings['supported']);

        // Get session language, TODO: use user settings instead
        $session = Session::instance();
        $lang_current = $session->get('lang');

        // Fallback to none
        if (! in_array($lang_current, $lang_supported))
        {
            $lang_current = NULL;
        }

        if (! $lang_current) {
            // Get lang from Request::accept_lang().
            foreach (Request::accept_lang() as $key => $val)
            {
                if (in_array($key, $lang_supported))
                {
                    $lang_current = $key;
                    break;
                }
            }
        }

        // Get lang from default
        if (! $lang_current) $lang_current = $lang_default;

        // Set session default, TODO: user instead
        if ($session->get('lang') != $lang_current) $session->set('lang', $lang_current);

        // get config from lang_current
        $lang_config = $lang_settings['supported'][$lang_current];

        // Set request language and locale
        if (i18n::lang() != $lang_config['code']) {
            i18n::lang($lang_config['code']);
            setlocale(LC_ALL, $lang_config['locale']);
        }

        return $instance;
    }
}
