<?php
include_once "routes.php";
$uri = $_SERVER['REQUEST_URI'];
$uri = preg_replace('/^\/test\//i','',$uri);
$route = get_route($uri);
if($route['controller']){
    include_once "controllers/{$route['controller']}.php";
    call_user_func_array($route['action'],$route['params']) ;
}
