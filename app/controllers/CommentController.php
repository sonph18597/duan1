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
        return view('comment.detail',[
            'comment' => $comment
        ]);
    }

    
}
?>