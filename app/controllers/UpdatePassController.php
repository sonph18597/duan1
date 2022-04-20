<?php
    namespace App\Controllers;

use App\Models\Users;

    class UpdatePassController{
        public function index(){
            return view('update_pass.index');
        }
        

// update pass
        public function update_pass(){
                $user = Users:: where ("ten_tai_khoan",$_SESSION["user"]["ten_tai_khoan"]) -> first();
        //pass_old
            if(strlen($_POST["mat_khau"]) >= 8){
                        
            }
            else{
                header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=mật khẩu có ít nhất 8 kí tự &idInput=1&doi-mat-khau");
                die;
            }

        // pass_new
            if(strlen($_POST["mat_khau_new"]) >= 8){
                            
            }
            else{
                header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=mật khẩu có ít nhất 8 kí tự &idInput=2&doi-mat-khau");
                die;
            }
        //re_pass_new 
            if  ( $_POST["mat_khau_new"] !=  $_POST["re_mat_khau_new"]){
                header("location:" . BASE_URL . "cap-nhat-tai-khoan?msg=mật khẩu không khớp&idInput=3&doi-mat-khau");
                die;
            }
        if (password_verify($_POST["mat_khau"],$user -> mat_khau)){
                $user -> mat_khau = password_hash($_POST['mat_khau_new'], PASSWORD_DEFAULT);
                $user -> save();
                header('location:'. BASE_URL. 'chi_tiet_tai_khoan?msg="doi_matkhau"');
        else {
            
        }
    }
}
?>