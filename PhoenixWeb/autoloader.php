<?php
/*
 *  FCD Apps APIs
 *  Autoloader
 * 
 *  (c) 2016 Milliken & Co. - Milliken Floors
 *  @author: Christopher Rains < christopher.rains@milliken.com >
 *  @date: 6 January 2016
 */


/*
 *  Require PHP 5.4.0+
 */
if(version_compare(PHP_VERSION, "5.4.0", "<")) {
    throw new \Exception("The FCD Apps APIs require PHP 5.4 or newer.");
}

/*
 *  Register autoloader for Orion PHP Classes.
 */
spl_autoload_register(function ($class) {
    $prefix = "PhoenixWeb\\";

    $class = trim($class, "\\");

    $len = mb_strlen($prefix);
    if(0 !== strncmp($prefix, $class, $len)) {
        return;
    }

    $file = BASE_PATH . "\\" . $class . ".php";

    if(file_exists($file)) {
        require_once($file);
    }
});