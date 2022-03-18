<?php

use App\Controllers\DashboardController;
use App\Controllers\TypeController;
use Phroute\Phroute\RouteCollector; 
function definedRoute($url){
    $router = new RouteCollector();

    $router->get('test-layout', function(){
        return view('layouts.main');
    });
    $router->filter('auth', function(){
        if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
            header('location: ' . BASE_URL . 'login');
            die;
        }
    });    
    

    $router->get('dashboard', [DashboardController::class, 'index']);

    $router->get('loai-ca',[TypeController::class,'index']);
        $router->get('loai-ca/tao-moi',[TypeController::class,'addForm']);
        $router->post('loai-ca/tao-moi',[TypeController::class,'saveAdd']);
        $router->get('loai-ca/cap-nhat_Sid{id}',[TypeController::class,'editForm']);
        $router->post('loai-ca/cap-nhat_Sid{id}',[TypeController::class,'saveEdit']);
        $router->get('loai-ca/xoa_Sid{id}',[TypeController::class,'remove']);

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}

?>