<?php
    namespace App\Controllers;

use App\Models\Users;

    class RegistrationController{
        public function index(){
            return view('registration.index');
        }
    

       public function add (){

        if($_POST ["ten_tai_khoan"]){
            $user = new Users();
            $user->ten_tai_khoan = $_POST ["ten_tai_khoan"];
            $user->mat_khau = $_POST["mat_khau"];
            $user->vai_tro = "Khách hàng";
            $user->ho_ten =  $_POST["ho_ten"];
            $user->so_dien_thoai = $_POST["so_dien_thoai"];
            $user->email = $_POST["email"];

            //acc
            $model = Users :: where ("ten_tai_khoan",   $_POST ["ten_tai_khoan"])-> first();
                $pattern = "/^[\w.-]{0,19}[0-9a-zA-Z]$/";
                if(preg_match($pattern,$_POST ["ten_tai_khoan"])){

                }
                else{
                    header("location:" . BASE_URL . "dang-ki?msg=tài khoản có 3 - 12 kí tự và không có kí tự đặc biệt&idInput=0");
                    die;
                }
                if($model){
                    header("location:" . BASE_URL . "dang-ki?msg=tên tài khoản đã tồn tại&idInput=0");
                    die;
                }

            //pass
                if(strlen($_POST["mat_khau"]) >= 8){
                    
                }
                else{
                    header("location:" . BASE_URL . "dang-ki?msg=mật khẩu có ít nhất 8 kí tự &idInput=1");
                    die;
                }

            // re_pass
                if  ( $user->mat_khau !=  $_POST["re_mat_khau"]){
                    header("location:" . BASE_URL . "dang-ki?msg=mật khẩu không khớp&idInput=2");
                    die;
                }
            
            //name
                $pattern = "/^[a-zA-Z]{0,}$/";
                if(preg_match($pattern,$_POST ["ho_ten"])){

                }
                else{
                    header("location:" . BASE_URL . "dang-ki?msg=họ tên không có số và kĩ tự đặc biệt&idInput=3");
                    die;
                }

            //number
                $pattern = "/^[0-9]{10,11}$/";
                if(preg_match($pattern,$_POST ["so_dien_thoai"])){

                }
                else{
                    header("location:" . BASE_URL . "dang-ki?msg=vui lòng nhập đúng số điện thoại&idInput=4");
                    die;
                }

            //email
                $pattern = "/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/";
                if(preg_match($pattern,$_POST ["email"])){

                }
                else{
                    header("location:" . BASE_URL . "dang-ki?msg=vui lòng nhập đúng email&idInput=5");
                    die;
                }
            $model_email = Users :: where ("email",   $_POST ["email"])-> first();
                if($model_email){
                    header("location:" . BASE_URL . "dang-ki?msg=tên email đã tồn tại&idInput=5");
                    die;
                }

            $user -> mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);
            $user -> save();
            header('location:'. BASE_URL . 'dang-nhap');
            die;
           
        }
        else{
            header('location:' . BASE_URL . 'dang-ki');
            die;
        }
    }
}
?>