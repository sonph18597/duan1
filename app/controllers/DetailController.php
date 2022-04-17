<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Fish;

class DetailController{
    public function index($ma_ca){
        return view('detail.index',[
            'ma_ca'=>$ma_ca
        ]
        );
    }
    public function post_comment($ma_ca){   
        Comment::create([
            'noi_dung'=>$_POST['noi_dung'],
            'ma_tai_khoan'=>$_SESSION['user']['ma_tai_khoan'],
            'ngay_binh_luan'=>date("Y/m/d"),
            'ma_ca'=>$_POST['ma_ca']
        ]);
        header('location:'.BASE_URL.'chi-tiet/'.$ma_ca);
    }
}
?>