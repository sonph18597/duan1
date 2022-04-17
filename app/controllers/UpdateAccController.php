<?php
    namespace App\Controllers;

use App\Models\Users;

    class UpdateAccController{
        public function index(){
            return view('updateAcc.index');
        }
    

       public function update (){
        if($_SESSION["user"]["ten_tai_khoan"]){
            

            //acc
            $user = Users :: where ("ten_tai_khoan",$_SESSION ["user"] ["ten_tai_khoan"])-> first();

            //name
                $pattern = "/^[a-zA-Z]{0,}$/";
                if(preg_match($pattern,$_POST ["ho_ten"])){

                }
                else{
                    header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=họ tên không có số và kĩ tự đặc biệt&idInput=3");
                    die;
                }

            //number
                $pattern = "/^[0-9]{10,11}$/";
                if(preg_match($pattern,$_POST ["so_dien_thoai"])){

                }
                else{
                    header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=vui lòng nhập đúng số điện thoại&idInput=4");
                    die;
                }

            //email
                $pattern = "/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}$/";
                if(preg_match($pattern,$_POST ["email"])){

                }
                else{
                    header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=vui lòng nhập đúng email&idInput=5");
                    die;
                }
        
            if($_POST ["email"] != $_SESSION["user"]["email"]){
                $model_email = Users :: where ("email",   $_POST ["email"])-> first();
                if($model_email){
                    header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=tên email đã tồn tại&idInput=5");
                    die;
                }
            }
            $_SESSION["user"]["ho_ten"] = $_POST["ho_ten"];
            $_SESSION["user"]["so_dien_thoai"] = $_POST ["so_dien_thoai"];
            $_SESSION["user"]["email"] = $_POST ["email"];
            $user->ho_ten =  $_POST["ho_ten"];
            $user->so_dien_thoai = $_POST["so_dien_thoai"];
            $user->email = $_POST["email"];
            $user -> save();
            header('location:'. BASE_URL . 'chi-tiet-tai-khoan');
            die;
        }
        else{
            echo "loi";
            die;
            header('location:' . BASE_URL . 'cap-nhat-tai-khoan');
            die;
            
        }
    }
}
?>