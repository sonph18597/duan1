<?php
namespace App\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Redirect;

class ReviewController{
    public function index(){   
        $review = Review::all();
        return view('review.index',[
            'review' => $review,
        ]);
    }

    public function detail($ma_danh_gia){
        $review = Review::where('ma_phan_hoi',$ma_danh_gia)->get();
        return view('review.detail',[
            'review' => $review,
            'ma_danh_gia' => $ma_danh_gia
        ]);
    }

    public function remove($ma_phan_hoi){
        Review::where ('ma_phan_hoi',$ma_phan_hoi)->delete();
        header('location: ' . BASE_URL . 'danh-gia');
    }

    public function removeAll($ma_danh_gia){
        Review::destroy('ma_danh_gia',$ma_danh_gia);
        Review::where ('ma_phan_hoi',$ma_danh_gia)->delete();

        header('location: ' . BASE_URL . 'danh-gia');

    }
}
?>