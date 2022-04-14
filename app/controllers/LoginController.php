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
                if($user -> mat_khau == $_POST["mat_khau"]){
                    $_SESSION ["user"] = [
                        "ten_tai_khoan" => $user -> ten_tai_khoan, 
                        "email" => $user -> email,
                        "vai_tro" => $user -> vai_tro
                    ];
                    header('location:'. BASE_URL. 'trang-chu');
                        die;
                }
                else {
                    header("location:" . BASE_URL . "dang-nhap?msg=sai mật khẩu");
                    die;
                }
            }
       }
}
