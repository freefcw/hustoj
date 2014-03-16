<?php
/*
 * User: freefcw
 * Date: 12-1-2
 * Time: 下午4:38
 * config of auth
 */

// see also: http://kohanaframework.org/3.2/guide/auth/config
return array(

	'driver'       => 'Hoj',
	'hash_method'  => 'sha256', // no effect
	'hash_key'     => 'hustoj', // no effect
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
//	'users' => array(
//		 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
//	),

);