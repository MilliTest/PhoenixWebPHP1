<?php
if(mb_strtolower(trim($_SERVER['REQUEST_URI'], "/")) === "config.php") exit("Direct access to this file is not allowed.");

/* Core Configuration Values */
$config['base_path']          = "D:\home\site\wwwroot";
$config['environment']        = "development";
$config['time_zone']          = "UTC";
$config['maintenance_mode']   = FALSE;

/* Log Configuration Values */
$config['log_enabled']        = TRUE;
$config['log_directory']      = "LOGS";
$config['log_threshold']      = 4;
$config['log_date_format']    = "Y-m-d H:i:s";

/* App Configuration Values */
$config['app_directory']      = "PhoenixWeb";

/* API Configuration Values */
$config['api_response_type']  = "auto";

/* Benchmark Configuration Values */
$config['benchmark_enabled']  = FALSE;
$config['benchmark_decimals'] = 4;