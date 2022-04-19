<?php
    namespace App\Controllers;

use App\Models\Users;

    class LoginController{
        public function index(){
            return view('login.index');
        }
    

       public function login (){
            $user = Users :: where ("ten_tai_khoan",$_POST["ten_tai_khoan"]) -> first(); 
            if($user){              
                if(password_verify($_POST["mat_khau"],$user -> mat_khau) ){
                    $_SESSION ["user"] = [
                        'ma_tai_khoan'=>$user -> ma_tai_khoan,
                        "ten_tai_khoan" => $user -> ten_tai_khoan, 
                        "email" => $user -> email,
                        "vai_tro" => $user -> vai_tro,
                        "anh_dai_dien" => $user -> anh_dai_dien,
                        "ho_ten" => $user -> ho_ten,
                        "so_dien_thoai" => $user -> so_dien_thoai,
                        "mat_khau" => $user -> mat_khau
                    ];   
                    header('location:'. BASE_URL. 'trang-chu');
                        die;
                }
                else {
                    header("location:" . BASE_URL . "dang-nhap?msg=sai mật khẩu hoặc tài khoản");
                    die;
                }
            }
            else {
                header("location:" . BASE_URL . "dang-nhap?msg=sai mật khẩu hoặc tài khoản");
                die;
            }
       }
    
       public function logout (){
            unset($_SESSION["user"]);
        return header('location:'. BASE_URL. 'trang-chu');
       }
}
        
?>
