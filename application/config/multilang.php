<?php defined('SYSPATH') or die('No direct script access.');

return array(

    'languages' => array(

        'supported' => array(

            'en' => array(
                'code'      => 'en-us',
                'locale'    => array('en_US.utf-8'),
                'name'      => 'English',
            ),

            'zh' => array(
                'code'     => 'zh-cn',
                'locale'   => array('zh_CN.utf-8'),
                'name'     => '简体中文',
            ),

        ),

        /* NOTE: The languages.default value must be one of the languages.supported keys. */
        'default' => 'en',
    ),

);
