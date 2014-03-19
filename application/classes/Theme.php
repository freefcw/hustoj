<?php defined('SYSPATH') OR die('No direct script access.');

class Theme {

    /**
     * Get user theme from current user
     *
     * @param array $themes_supported themes supported
     *
     * @return string themes got from user or NULL
     */
    private static function get_user_theme($themes_supported) {
        $user = Auth::instance()->get_user();
        if ( ! $user ) return NULL;
        $theme_current = $user->theme;
        return in_array($theme_current, $themes_supported) ? $theme_current : NULL;
    }

    /**
     * Get supported theme
     *
     * @return array supported theme
     */
    public static function supported_themes() {
        $theme_settings = Kohana::$config->load('themes')->get('themes', array());
        return $theme_settings['supported'];
    }

    /**
     * Get current theme
     * for current request
     *
     * @return string theme name
     */
    public static function get_theme() {
        // Get theme config variables
        $theme_settings = Kohana::$config->load('themes')->get('themes', array());
        $theme_supported = array_keys($theme_settings['supported']);

        // Get theme
        $theme_current = self::get_user_theme($theme_supported);
        if (! $theme_current) $theme_current = $theme_settings['default'];

        return $theme_current;
    }
}
