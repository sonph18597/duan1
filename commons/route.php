<?php

use App\Controllers\BranchController;
use App\Controllers\DashboardController;
use App\Controllers\FishController;
use App\Controllers\TypeController;
use App\Controllers\UsersController;
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

    $router->get('nguoi-dung',[UsersController::class,'index']);
    $router->get('nguoi-dung/tao-moi',[UsersController::class,'addForm']);
    $router->post('nguoi-dung/tao-moi',[UsersController::class,'saveAdd']);
    $router->get('nguoi-dung/cap-nhat_id{id}',[UsersController::class,'editForm']);
    $router->post('nguoi-dung/cap-nhat_id{id}',[UsersController::class,'saveEdit']);
    $router->get('nguoi-dung/xoa_id{id}',[UsersController::class,'remove']);
    
    $router->get('chi-nhanh',[BranchController::class,'index']);
    $router->get('chi-nhanh/tao-moi',[BranchController::class,'addForm']);
    $router->post('chi-nhanh/tao-moi',[BranchController::class,'saveAdd']);
    $router->get('chi-nhanh/cap-nhat_id{id}',[BranchController::class,'editForm']);
    $router->post('chi-nhanh/cap-nhat_id{id}',[BranchController::class,'saveEdit']);
    $router->get('chi-nhanh/xoa_id{id}',[BranchController::class,'remove']);
    

    $router->get('ca',[FishController::class,'index']);
    $router->get('ca/tao-moi',[FishController::class,'addForm']);
    $router->post('ca/tao-moi',[FishController::class,'saveAdd']);
    $router->get('ca/cap-nhat_id{id}',[FishController::class,'editForm']);
    $router->post('ca/cap-nhat_id{id}',[FishController::class,'saveEdit']);
    $router->get('ca/xoa_id{id}',[FishController::class,'remove']);
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;
}
