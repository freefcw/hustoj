<?php defined('SYSPATH') OR die('No direct script access.');

class I18n extends Kohana_I18n {
    /**
      * @param   string   text to translate
      * @param   string   target language
      * @return  string
      */
    public static function get($string, $lang = NULL) {
        if ( ! $lang)
        {
            $lang = I18n::$lang;
        }
        $table = I18n::load($lang);
        $alternative = I18n::load('en-us');
        return isset($table[$string]) ? $table[$string] :
              (isset($alternative[$string]) ? $alternative[$string] : $string);
    }
}

/**
  * @uses    I18n::get
  * @param   string  text to translate
  * @param   array   values to replace in the translated text
  * @param   string  source language (ignore here for no source language)
  * @return  string
  */
function __($string, array $values = NULL, $source = NULL) {
    $string = I18n::get($string);
    return empty($values) ? $string : strtr($string, $values);
}
