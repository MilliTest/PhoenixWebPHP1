<?php
use \Orion\v1\Web\Mvc\Modules\Classes;
use \FcdAppsApis\Generic;

/* Set UTF-8 as default encoding... */
mb_internal_encoding("UTF-8");

/* Liberal execution time... */
ini_set("max_execution_time", 300);

/* Set Error Reporting */
if(mb_strtolower($config['environment']) === "development") {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/* Add Polyfills for missing multibyte functions */
require_once(BASE_PATH . "\\Orion\\v1\\Web\\Helpers\\mb_functions.php");

/* Set configured Time Zone or Default */
date_default_timezone_set($config['time_zone']);

/* Require Orion Autoloader */
require_once(BASE_PATH . "\\Orion\\v1\\autoloader.php");
require_once(BASE_PATH . "\\" . $config['app_directory'] . "\\autoloader.php");

// Initialize Config Class
$CONFIG = new Classes\Config($config);
unset($config);

// Initialize Log Class
$LOG = new Classes\Log($CONFIG);

$BENCHMARK = new Classes\Benchmark($CONFIG, $LOG);
$BENCHMARK->set("start");
