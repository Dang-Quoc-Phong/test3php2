<?php

use App\Controllers\TaskController;
use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});
$router->get('list-task',[TaskController::class, 'getTask']);
$router->get('add-task',[TaskController::class, 'addTask']);
$router->post('post-task',[TaskController::class, 'postTask']);
$router->get('edit-task/{id}',[TaskController::class, 'editTask']);
$router->post('edit-post/{id}',[TaskController::class, 'postEdit']);
$router->get('delete-task/{id}',[TaskController::class, 'deleteTask']);
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>