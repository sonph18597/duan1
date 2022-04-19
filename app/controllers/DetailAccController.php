<?php
    namespace App\Controllers;
    use App\Models\Users;

    class DetailAccController {
        public function index(){
            return view('DetailAcc.index');
        }

        public function up_img(){
            $target = "../duan1/public/dist/img/";
            $name_img = basename($_FILES['img_up']['name']);
            $target_file = $target . $name_img;
            move_uploaded_file($_FILES["img_up"]["tmp_name"], $target_file);
            $_SESSION['user']['anh_dai_dien'] = $name_img;
            $user = Users:: where ("ten_tai_khoan",$_SESSION["user"]["ten_tai_khoan"]) -> first();
            $user -> anh_dai_dien = $name_img;
            $user -> save();
            header('location:'. BASE_URL. 'chi-tiet-tai-khoan');
        }
    }

    
?>