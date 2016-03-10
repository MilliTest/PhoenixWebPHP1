<?php
if(mb_strtolower(trim($_SERVER['REQUEST_URI'], "/")) === "routes.php") exit("Direct access to this file is not allowed.");

$routes['/public/v1.xml'] = array(
    "controller" => "Home",
    "action"     => "Index"
);
$routes['/public/v1.json'] = array(
    "controller" => "Home",
    "action"     => "Index"
);