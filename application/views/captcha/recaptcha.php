<?php
$public_key = Kohana::$config->load('base')->get('captcha_public_key', false);
$path = Kohana::find_file('vendor', 'recaptcha-php-1.11/recaptchalib');
require_once $path;
echo recaptcha_get_html($public_key);