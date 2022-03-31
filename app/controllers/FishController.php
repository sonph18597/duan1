<?php
namespace App\Controllers;

use App\Models\Fish;
use App\Models\ManageFish;

class FishController{
    public function index(){
        $fish = Fish::all();
        return view('fish.index',[
            'fish'=>$fish
        ]
        );
    }

    public function addForm(){
        return view('fish.addform');
    }

    public function saveAdd(){
        Fish::create([
            'ma_loai'=>$_POST['ma_loai'],
            'ten_ca'=>$_POST['ten_ca'],
            'kich_thuoc'=>$_POST['kich_thuoc'],
            'tuoi'=>$_POST['tuoi'],
            'giai_thuong'=>$_POST['giai_thuong'],
            'gia_goc'=>$_POST['gia_goc'],
            'gia_ban'=>$_POST['gia_ban'],
            'anh'=>$_POST['anh'],
            'gia_goc'=>$_POST['gia_goc'],
            'xuat_xu'=>$_POST['xuat_xu'],
            'ngay_nhap'=>$_POST['ngay_nhap'],
        ]);
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function editForm($ma_ca){
        
        $fish = Fish::find($ma_ca);

        return view('fish.editform',[
            'fish'=>$fish,
        ]);
    }

    public function saveEdit($ma_ca){
        $fish = Fish::find($ma_ca);
        $fish->ma_loai =$_POST['ma_loai'];
        $fish->ten_ca =$_POST['ten_ca'];
        $fish->kich_thuoc =$_POST['kich_thuoc'];
        $fish->tuoi =$_POST['tuoi'];
        $fish->giai_thuong =$_POST['giai_thuong'];
        $fish->gia_ban =$_POST['gia_ban'];
        $fish->gia_goc =$_POST['gia_goc'];
        if($_POST['anh']){
            $fish->anh =$_POST['anh'];
        }
        $fish->trang_thai =$_POST['trang_thai'];
        $fish->xuat_xu =$_POST['xuat_xu'];
        $fish->ngay_nhap =$_POST['ngay_nhap'];

        $fish->save();
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function remove($ma_ca){
        Fish::destroy($ma_ca);
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function detail($ma_ca){
        $fish = Fish::find($ma_ca);
        $manage = ManageFish::where('ma_ca',$ma_ca)->get();
        return view('fish.detail',[
            'fish'=>$fish,
            'manage'=>$manage
        ]);
    }
}
?>