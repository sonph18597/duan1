<?php
    namespace App\Controllers;
use App\Models\Users;

    class DetailAccController {
        public function index(){
            return view('DetailAcc.index');
        }

        public function up_img(){
            $target = "../du-an-1/public/dist/img/";
            $name_img = basename($_FILES['img_up']['name']);
            $target_file = $target . $name_img;
           move_uploaded_file($_FILES["img_up"]["tmp_name"], $target_file);
            header('location:'. BASE_URL. 'chi-tiet-tai-khoan?msg=vui lòng nhập file');
        }
    }

    
?>