<?php
if(mb_strtolower(trim($_SERVER['REQUEST_URI'], "/")) === "routes.php") exit("Direct access to this file is not allowed.");

$routes['/legal'] = array(
    "controller"  => "Legal",
    "action"      => "Index",
    "webservice"  => false
);
$routes['/legal/terms'] = array(
    "controller"  => "Legal",
    "action"      => "Terms",
    "webservice"  => false
);
$routes['/legal/privacy'] = array(
    "controller"  => "Legal",
    "action"      => "Privacy",
    "webservice"  => false
);