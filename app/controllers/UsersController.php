<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\ManageBranch;
use App\Models\Order;
use App\Models\Review;
use App\Models\Type;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController
{
    public function index()
    {
        $user = Users::orderByRaw('ten_tai_khoan')->get();
        return view('users.index', [
            'user' => $user
        ]);
    }
   
    public function addForm()
    {
        return view('users.addform');
    }

    // Function add

    public function saveAdd( )
    {   
        $user = Users::where('ten_tai_khoan',$_POST['ten_tai_khoan'])->first();
        $email = Users::where('email',$_POST['email'])->first();
        if(isset($user)){
            header('location: ' . BASE_URL . 'nguoi-dung/tao-moi?msg=Tên tài khoản đã tồn tại');
            die;
        }else if($email){
            header('location: ' . BASE_URL . 'nguoi-dung/tao-moi?msg= Email đã tồn tại');
            die;
        }else  {
            Users::create([
                'ten_tai_khoan' => $_POST['ten_tai_khoan'],
                'so_dien_thoai' => $_POST['so_dien_thoai'],
                'ho_ten' => $_POST['ho_ten'],
                'vai_tro' => $_POST['vai_tro'],
                'email' => $_POST['email'],
                'anh_dai_dien' => $_POST['anh_dai_dien'],
                'mat_khau' => password_hash($_POST['mat_khau'], PASSWORD_DEFAULT)
            ]);
           
            header('location: ' . BASE_URL . 'nguoi-dung');
            die;
        }
        
    }

    public function editForm($ma_tai_khoan)
    {
        $user = Users::find($ma_tai_khoan);
        if (!$user) {
            header('location: ' . BASE_URL . 'nguoi-dung');
        } else {
            return view('users.editform', [
                'user' => $user
            ]);
        }
    }

    public function saveEdit($ma_tai_khoan)
    {
        
        $user = Users::find($ma_tai_khoan);
        $user->ten_tai_khoan = $_POST['ten_tai_khoan'];
        $user->so_dien_thoai = $_POST['so_dien_thoai'];
        $user->ho_ten = $_POST['ho_ten'];
        $user->vai_tro = $_POST['vai_tro'];
        $user->email = $_POST['email'];
 
        if($_POST['anh_dai_dien']){
            $user->anh_dai_dien = $_POST['anh_dai_dien'];
        }
       
        $user->vai_tro = $_POST['vai_tro'];
    
        $user->save();
        header('location: ' . BASE_URL . 'nguoi-dung');
    }

    public function remove($ma_tai_khoan){
        Users::destroy($ma_tai_khoan);
        Comment::where('ma_tai_khoan',$ma_tai_khoan)->delete();
        Content::where('ma_tai_khoan',$ma_tai_khoan)->delete();
        ManageBranch::where('ma_tai_khoan',$ma_tai_khoan)->delete();
        Order::where('ma_tai_khoan',$ma_tai_khoan)->delete();
        Review::where('ma_tai_khoan',$ma_tai_khoan)->delete();

        header('location: ' . BASE_URL . 'nguoi-dung');
        die;
    }


}
