<?php
namespace App\Controllers;

use App\Models\Content;
use App\Models\Fish;
use App\Models\Users;

class ContentController{
    public function index(){
        $content = Content::all();
        return view('content.index',[
            'content' => $content
        ]);
    }

    public function addForm(){
        $user = Users::all();
        $fish = Fish::all();
        return view('content.addform',[
            'user' => $user,
            'fish' => $fish
        ]);
    }

    public function saveAdd(){
        Content::create([
            'tieu_de'=> $_POST['tieu_de'],
            'anh'=>$_POST['anh'],
            
            'ma_ca'=>$_POST['ma_ca'],
            'ma_tai_khoan'=>$_POST['ma_tai_khoan'],

        ]);
        header('location: ' . BASE_URL . 'bai-viet');
    }

    public function editForm($ma_bai_viet){
        
        $content = Content::find($ma_bai_viet);
        $user = Users::all();
        $fish = Fish::all();
        return view('content.editform',[
            'content'=>$content,
            'user' => $user,
            'fish' => $fish
        ]);
    }

    public function saveEdit($ma_bai_viet){
        $content =  Content::find($ma_bai_viet);
        $content->tieu_de = $_POST['tieu_de'];
        if($_POST['anh']){
            $content->anh = $_POST['anh'];
        }
    
        if($_POST['ma_tai_khoan']){
            $content->ma_tai_khoan = $_POST['ma_tai_khoan'];
        }
        if($_POST['ma_ca']){
            $content->ma_ca = $_POST['ma_ca'];
        }
        $content->save();
        header('location: ' . BASE_URL . 'bai-viet');
        die;
    }
    public function remove($ma_bai_viet)
    {
        Content::destroy($ma_bai_viet);
        header('location: ' . BASE_URL . 'bai-viet');
        die;
    }
}
?>