<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
    // Application extends the core
    require APPPATH.'classes/Kohana'.EXT;
}
else
{
    // Load empty core extension
    require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Asia/Shanghai');

/**
 * Set the system default locale.
 * Muti-language settings in config/multilang.php
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

if (isset($_SERVER['SERVER_PROTOCOL']))
{
    // Replace the default protocol.
    HTTP::$protocol = $_SERVER['SERVER_PROTOCOL'];
}

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
$env = getenv('KOHANA_ENV');
if (defined('Kohana::'.strtoupper($env)) === false)
{
    $env = 'production';
    Kohana::$environment = Kohana::PRODUCTION;
} else {
    Kohana::$environment = constant('Kohana::'.strtoupper($env));
}
/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */
Kohana::init(array(
     'base_url'  => '/',
     'index_file' => FALSE,
     'profile'    => Kohana::$environment !== Kohana::PRODUCTION,
     'caching'    => Kohana::$environment === Kohana::PRODUCTION,
 ));
/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH . 'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);
Kohana::$config->attach(new Config_File('config/'.$env));

$config = Kohana::$config->load('base');

Kohana::$base_url = $config->get('base_url', '/');
/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(Kohana::$config->load('modules')->as_array());

/**
 * Set the system default language
 * Muti-language settings in config/multilang.php
 */
I18n::lang('en-us');

/**
 * set Cookie config
 */
Cookie::$salt = $config->get('salt', 'hustoj');
Cookie::$domain = $config->get('domain');

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('show_problem_data', 'admin/problem/showdata/<id>/<filename>.<ext>', array(
    'filename' => '\w+',
    'ext' => '\w+',
))->defaults(array(
                    'directory'  => 'admin',
                    'controller' => 'problem',
                    'action'     => 'showdata'
                )
     );

Route::set('del_problem_data', 'admin/problem/deldata/<id>/<filename>.<ext>', array(
    'filename' => '\w+',
    'ext' => '\w+',
))->defaults(array(
                    'directory'  => 'admin',
                    'controller' => 'problem',
                    'action'     => 'deldata'
                )
     );

Route::set('admin', 'admin(/<controller>(/<action>(/<id>)))')
    ->defaults(array(
        'directory'  => 'admin',
        'controller' => 'index',
        'action'     => 'index'
    )
);

Route::set(
    'auth', '<action>',
    array('action' => '(login|logout|setting|setting)')
)->defaults(array(
         'controller' => 'user'
    )
);
Route::set('search', 'problem/search')
    ->defaults(array(
         'controller' => 'problem',
         'action'     => 'search'
    )
);

Route::set(
    'ranklist', 'rank/user(/<id>)',
    array(
        'id' => '[[:word:]]+'
    ))->defaults(array(
         'controller' => 'user',
         'action'     => 'list'
    )
);

Route::set(
    'profile', 'u/<uid>',
    array(
        'uid' => '[[:word:]]+'
    ))->defaults(array(
         'controller' => 'user',
         'action'     => 'profile'
    )
);

Route::set(
        'status', 'status'
    )->defaults(array(
        'controller' => 'solution',
        'action'     => 'status'
    )
);

Route::set(
    'topic', 't/<id>',
    array(
        'id' => '\d+'
    ))->defaults(array(
        'controller' => 'discuss',
        'action'     => 'topic'
    )
);

Route::set('news', 'news/<id>',
    array(
        'id' => '\d+'
    ))->defaults(array(
          'controller' => 'index',
          'action'     => 'news',
));

Route::set(
    'page', '<action>',
    array(
         'action' => '(faqs|about|links|contact|help|terms)'
    ))->defaults(array(
         'controller' => 'index'
    )
);
Route::set(
    'contest-problem', 'contest/<cid>/problem/<pid>',
    array('cid' => '\d+',
          'pid' => '\d+'
    ))->defaults(array(
         'controller' => 'contest',
         'action'     => 'problem',
    )
);

Route::set(
    'default', '(<controller>(/<action>(/<id>(/<overflow>))))',
    array(
         'overflow' => '.*?'
    ))->defaults(array(
         'controller' => 'index',
         'action'     => 'index',
    )
);
