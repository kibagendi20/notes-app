<?php
 use Core\Router;

 session_start();

 const BASE_PATH = __DIR__ . '/../';

 require BASE_PATH . 'Core/functions.php';
 
 
 spl_autoload_register(function($class){
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
 });

 require base_path('/Core/bootstrap.php');

//  require base_path('Core/router.php');

 $router = new Router();

 $routes = require base_path('routes.php');

 $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

 $method =   $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


//  $method =  isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
// dd("{$uri} and method {$method}");


 $router -> route($uri, $method);

 
 