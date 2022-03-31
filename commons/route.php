<?php

use App\Controllers\BranchController;
use App\Controllers\CommentController;
use App\Controllers\ContentController;
use App\Controllers\DashboardController;
use App\Controllers\FishController;
use App\Controllers\OrderController;
use App\Controllers\TypeController;
use App\Controllers\UsersController;
use Phroute\Phroute\RouteCollector; 
use App\Controllers\PostController;


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
    $router->get('loai-ca/cap-nhat_id/{ma_loai}',[TypeController::class,'editForm']);
    $router->post('loai-ca/cap-nhat_id/{ma_loai}',[TypeController::class,'saveEdit']);
    $router->get('loai-ca/xoa_id/{ma_loai}',[TypeController::class,'remove']);

    $router->get('nguoi-dung',[UsersController::class,'index']);
    $router->get('nguoi-dung/tao-moi',[UsersController::class,'addForm']);
    $router->post('nguoi-dung/tao-moi',[UsersController::class,'saveAdd']);
    
    $router->get('nguoi-dung/cap-nhat_id/{ma_tai_khoan}',[UsersController::class,'editForm']);
    $router->post('nguoi-dung/cap-nhat_id/{ma_tai_khoan}',[UsersController::class,'saveEdit']);
    $router->get('nguoi-dung/xoa_id/{ma_tai_khoan}',[UsersController::class,'remove']);
    
    $router->get('chi-nhanh',[BranchController::class,'index']);
    $router->get('chi-nhanh/tao-moi',[BranchController::class,'addForm']);
    $router->post('chi-nhanh/tao-moi',[BranchController::class,'saveAdd']);
    $router->get('chi-nhanh/cap-nhat_id/{ma_chi_nhanh}',[BranchController::class,'editForm']);
    $router->post('chi-nhanh/cap-nhat_id/{ma_chi_nhanh}',[BranchController::class,'saveEdit']);
    $router->get('chi-nhanh/xoa_id/{ma_chi_nhanh}',[BranchController::class,'remove']);
    $router->get('chi-nhanh/chi-tiet_id/{ma_chi_nhanh}',[BranchController::class,'detail']);

    $router->get('ca',[FishController::class,'index']);
    $router->get('ca/tao-moi',[FishController::class,'addForm']);
    $router->post('ca/tao-moi',[FishController::class,'saveAdd']);
    $router->get('ca/cap-nhat_id/{ma_ca}',[FishController::class,'editForm']);
    $router->post('ca/cap-nhat_id/{ma_ca}',[FishController::class,'saveEdit']);
    $router->get('ca/xoa_id/{ma_ca}',[FishController::class,'remove']);
    $router->get('ca/chi-tiet_id/{ma_ca}',[FishController::class,'detail']);

    $router->get('binh-luan',[CommentController::class,'index']);
    $router->get('binh-luan/chi-tiet_id/{ma_ca}',[CommentController::class,'detail']);
    $router->post('binh-luan/xoa-chi-tiet_id/{ma_ca}',[CommentController::class,'removeDetail']);
    $router->get('binh-luan/xoa_id/{ma_ca}',[CommentController::class,'remove']);
    
   
    $router->get('don-hang',[OrderController::class,'index']);
    $router->get('don-hang-chi-tiet_id/{ma_don_hang}',[OrderController::class,'orderDetail']);
    $router->get('don-hang/xoa_id/{ma_don_hang}',[OrderController::class,'remove']);
    

    $router->get('bai-viet',[ContentController::class,'index']);
    $router->get('bai-viet/tao-moi',[ContentController::class,'addForm']);
    $router->post('bai-viet/tao-moi',[ContentController::class,'saveAdd']);
    $router->get('bai-viet/cap-nhat_id/{ma_bai_viet}',[ContentController::class,'editForm']);
    $router->post('bai-viet/cap-nhat_id/{ma_bai_viet}',[ContentController::class,'saveEdit']);
    $router->get('bai-viet/xoa_id/{ma_bai_viet}',[ContentController::class,'remove']);

    

   
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;


}
