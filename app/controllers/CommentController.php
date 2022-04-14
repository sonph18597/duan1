<?php
namespace App\Controllers;

use App\Models\Comment;
use App\Models\Fish;

class CommentController{
    public function index(){
        $fish = Fish::all();
        return view('comment.index',[
            'fish'=> $fish
        ]);
    }

    public function detail($ma_ca){
        $comment = Comment::where('ma_ca',$ma_ca)->get();
        if($comment){
            return view('comment.detail',[
                'comment' => $comment
            ]);
        }else{
            return null;
        }
       
    }

    public function remove($ma_binh_luan){
        $comment = Comment::where('ma_binh_luan',$ma_binh_luan)->first();
        $comment->delete();
        header('location: ' . BASE_URL . 'binh-luan/chi-tiet_id/'.$comment->ma_ca);
        die;
    }
    
    public function removeAll($ma_ca){
        $commnet =  Comment::where('ma_ca',$ma_ca)->delete();
        header('location: ' . BASE_URL . 'binh-luan');
        die;

    }

    public function feedBack($ma_binh_luan){
        $comment = Comment::where('ma_phan_hoi',$ma_binh_luan)->get();
        return view('comment.feedback',[
            'comment' => $comment,
        ]);
    }
}
?>