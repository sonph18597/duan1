 <?php
use App\Controllers\ContactController;
use App\Controllers\BranchController;
use App\Controllers\CommentController;
use App\Controllers\ContentController;
use App\Controllers\DashboardController;
use App\Controllers\FishController;
use App\Controllers\ReviewFishController;
use App\Controllers\OrderController;
use App\Controllers\TypeController;
use App\Controllers\UsersController;
use App\Controllers\ShopingController;
use App\Controllers\ReviewController;
use App\Controllers\DetailPostController;
use App\Controllers\StatisticalController;
use App\Controllers\HomeController;
use App\Controllers\KnowledgeController;
use App\Controllers\GalleryController;
use App\Controllers\DetailController;
use App\Controllers\IntroController;
use App\Controllers\LoginController;
use App\Controllers\RegistrationController;
use App\Controllers\ShopController;
use App\Controllers\PostsController;
use Phroute\Phroute\RouteCollector;
use App\Controllers\DetailAccController;
use App\Controllers\UpdateAccController;
use App\Controllers\UpdatePassController;

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
    

    $router->get('admin', [DashboardController::class, 'index']);

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
    $router->get('chi-nhanh/xoa-ca_id/{ma_ca_theo_chi_nhanh}',[BranchController::class,'removeFish']);

    $router->get('ca',[FishController::class,'index']);
    $router->get('ca/tao-moi',[FishController::class,'addForm']);
    $router->post('ca/tao-moi',[FishController::class,'saveAdd']);
    $router->get('ca/cap-nhat_id/{ma_ca}',[FishController::class,'editForm']);
    $router->post('ca/cap-nhat_id/{ma_ca}',[FishController::class,'saveEdit']);
    $router->get('ca/xoa_id/{ma_ca}',[FishController::class,'remove']);
    $router->get('ca/chi-tiet_id/{ma_ca}',[FishController::class,'detail']);
    
    $router->get('/',[HomeController::class,'index']);
    $router->get('trang-chu',[HomeController::class,'index']);
    $router->get('lien-he',[ContactController::class,'index']);
    $router->get('kien-thuc',[KnowledgeController::class,'index']);
    $router->get('kien-thuc/chi-tiet-bai-viet',[DetailPostController::class,'index']);
    $router->get('thu-vien',[GalleryController::class,'index']);
    $router->get('chi-tiet',[DetailController::class,'index']);
    $router->get('gioi-thieu',[IntroController::class,'index']);
   
    

    $router->get('ca/chi-nhanh_id/{ma_ca}',[FishController::class,'fishBranch']);
    $router->post('ca/chi-nhanh_id/{ma_ca}',[FishController::class,'saveA']);
    $router->get('ca/chi-nhanh-cap-nhat_id/{ma_ca}',[FishController::class,'editF']);
    $router->post('ca/chi-nhanh-cap-nhat_id/{ma_ca}',[FishController::class,'editbranch']);
    $router->get('ca/chi-nhanh-xoa_id/{ma_chi_nhanh}',[FishController::class,'removeBranch']);


    $router->get('binh-luan',[CommentController::class,'index']);
    $router->get('binh-luan/chi-tiet_id/{ma_ca}',[CommentController::class,'detail']);
    $router->post('binh-luan/xoa-chi-tiet_id/{ma_ca}',[CommentController::class,'removeDetail']);
    $router->get('binh-luan/xoa_id/{ma_binh_luan}',[CommentController::class,'remove']);
    $router->get('binh-luan/xoa-all_id/{ma_ca}',[CommentController::class,'removeAll']);
    $router->get('binh-luan/phan-hoi_id/{ma_binh_luan}',[CommentController::class,'feedBack']);
    $router->get('binh-luan/xoa-phan-hoi_id/{ma_binh_luan}',[CommentController::class,'removeFeedBack']);
    $router->get('don-hang',[OrderController::class,'index']);
    $router->get('don-hang-chi-tiet_id/{ma_don_hang}',[OrderController::class,'orderDetail']);
    $router->get('don-hang-trang-thai/{ma_don_hang}',[OrderController::class,'status']);
    $router->post('don-hang-trang-thai/{ma_don_hang}',[OrderController::class,'saveStatus']);
    $router->get('danh-gia-san-pham',[ReviewFishController::class,'index']);

    

    $router->get('bai-viet',[ContentController::class,'index']);
    $router->get('bai-viet/tao-moi',[ContentController::class,'addForm']);
    $router->post('bai-viet/tao-moi',[ContentController::class,'saveAdd']);
    $router->get('bai-viet/cap-nhat_id/{ma_bai_viet}',[ContentController::class,'editForm']);
    $router->post('bai-viet/cap-nhat_id/{ma_bai_viet}',[ContentController::class,'saveEdit']);
    $router->get('bai-viet/xoa_id/{ma_bai_viet}',[ContentController::class,'remove']);

    $router->get('thong-ke',[StatisticalController::class,'index']);
    $router->get('thong-ke/chi-tiet_id/{ma_chi_nhanh}',[StatisticalController::class,'detail']);

    $router->get('danh-gia',[ReviewController::class,'index']);
    $router->get('tra-loi-danh-gia_id/{ma_danh_gia}',[ReviewController::class,'detail']);
    $router->get('xoa-danh-gia_id/{ma_danh_gia}',[ReviewController::class,'removeAll']);
    $router->get('xoa-danh-gia-phan-hoi_id/{ma_phan_hoi}',[ReviewController::class,'remove']);
   
    $router->get('chi-tiet/{ma_ca}',[DetailController::class,'index']);
    $router->post('chi-tiet/{ma_ca}',[DetailController::class,'post_comment']);
    
 
    $router->get('dang-nhap',[LoginController::class,'index']);
    $router->post('dang-nhap',[LoginController::class,'login']);
    $router->get('gio-hang',[ShopController::class,'index']);
    $router->get('dang-ki',[RegistrationController::class,'index']);
    $router->post('dang-ki',[RegistrationController::class,'add']);
    $router->get('dang-xuat',[LoginController::class,'logout']);
    $router->get('chi-tiet-don-hang',[ShopingController::class,'index']);
    $router->get('chi-tiet-tai-khoan',[DetailAccController::class,'index']);
    $router->post('chi-tiet-tai-khoan',[DetailAccController::class,'up_img']);
    $router->get('cap-nhat-tai-khoan',[UpdateAccController::class,'index']);
    $router->post('cap-nhat-tai-khoan',[UpdateAccController::class,'update']);
    $router->post('cap-nhat-mat-khau',[UpdatePassController::class,'update_pass']);
    $router->get('cap-nhat-mat-khau',[UpdatePassController::class,'index']);
    
    

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
    echo $response;


}
