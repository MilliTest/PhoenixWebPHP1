<?php
if(mb_strtolower(trim($_SERVER['REQUEST_URI'], "/")) === "config.php") exit("Direct access to this file is not allowed.");

/* Core Configuration Values */
$config['environment']        = "development";
$config['time_zone']          = "UTC";

/* Log Configuration Values */
$config['log_enabled']        = TRUE;
$config['log_directory']      = "LOGS";
$config['log_threshold']      = 4;
$config['log_date_format']    = "Y-m-d H:i:s";

/* App Configuration Values */
$config['app_directory']      = "FcdAppsApis";

/* API Configuration Values */
$config['is_api']             = TRUE;
$config['api_response_type']  = "auto";

/* Benchmark Configuration Values */
$config['benchmark_enabled']  = TRUE;
$config['benchmark_decimals'] = 4;