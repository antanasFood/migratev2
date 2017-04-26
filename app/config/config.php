<?php
/*
 * Modified: preppend directory path of current file, because of this file own different ENV under between Apache and command line.
 * NOTE: please remove this comment.
 */
defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

date_default_timezone_set('Europe/Vilnius');

return new \Phalcon\Config([
    'database' => [
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'root',
        'password'    => 'food',
        'dbname'      => 'food_dev_lt',
        'charset'     => 'utf8',
    ],
//    'database2' => [
//        'adapter'     => 'Mysql',
//        'host'        => 'd31669.mysql.zonevs.eu',
//        'username'    => 'd31669sa108231',
//        'password'    => 'stageChef33',
//        'dbname'      => 'd31669sd113776',
//        'charset'     => 'utf8',
//    ],
    'application' => [
        'appDir'         => APP_PATH . '/',
        'controllersDir' => APP_PATH . '/controllers/',
        'tasksDir'       => APP_PATH . '/tasks/',
        'modelsDir'      => APP_PATH . '/models/',
        'helpersDir'     => APP_PATH . '/helpers/',
        'migrationsDir'  => APP_PATH . '/migrations/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '',
    ],
    'params' =>
    [
        'locale'    => 'lt',
        'locales' => ["lt", "en", "ru"],
        'available_cities' => ["Vilnius", "Kaunas", "Klaipėda"],
        'available_cities_slugs' => ["Vilnius", "Kaunas", "Klaipeda"],
        'country' => 'lt',

    ]
]);
