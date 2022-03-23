<?php

namespace App\Controllers;

use App\Models\Type;
use App\Models\Users;

class UsersController
{
    public function index()
    {
        $user = Users::all();
        return view('users.index', [
            'user' => $user
        ]);
    }

    public function addForm()
    {
        return view('users.addform');
    }

    // Function add
    public function saveAdd()
    {   $user = Users::where('ten_tai_khoan',$_POST['ten_tai_khoan'])->first();
      
        if($user){
            header('location: ' . BASE_URL . 'nguoi-dung/tao-moi?msg=Tên tài khoản dùng đã tồn tại');
            die;
        }else{
            Users::create([
                'ten_tai_khoan' => $_POST['ten_tai_khoan'],
                'so_dien_thoai' => $_POST['so_dien_thoai'],
                'ho_ten' => $_POST['ho_ten'],
                'mat_khau' => $_POST['mat_khau'],
                'vai_tro' => $_POST['vai_tro'],
                'email' => $_POST['email'],
                'anh_dai_dien' => $_POST['anh_dai_dien']
            ]);
            header('location: ' . BASE_URL . 'nguoi-dung');
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
        $user->mat_khau = $_POST['mat_khau'];
        $user->vai_tro = $_POST['vai_tro'];
        $user->email = $_POST['email'];
        $user->anh_dai_dien = $_POST['anh_dai_dien'];
        $user->save();
        header('location: ' . BASE_URL . 'nguoi-dung');
    }

    public function remove($ma_tai_khoan){
        Users::destroy($ma_tai_khoan);
        header('location: ' . BASE_URL . 'nguoi-dung');
        die;
    }
}
