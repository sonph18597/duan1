<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Fish;
use App\Models\ManageFish;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\Type;

class FishController{
    public function index(){
        $fish = Fish::orderByRaw('ten_ca')->get();
        return view('fish.index',[
            'fish'=>$fish
        ]
        );
    }

    public function addForm(){
        $type = Type::orderByRaw('ten_loai ')->get();
        $branch = Branch::orderByRaw('ten_chi_nhanh')->get();
        return view('fish.addform',[
            'type'=>$type,
            'branch'=>$branch
        ]);
    }

    public function saveAdd(){
        $fish = Fish::where('ten_ca',$_POST['ten_ca'])->first();
        if($fish){
            header('location: ' . BASE_URL . 'ca/tao-moi?msg=Tên cá đã tồn tại');
            die;
        }

        $fishes = Fish::create([
            'ma_loai'=>$_POST['ma_loai'],
            'ten_ca'=>$_POST['ten_ca'],         
            'gia_goc'=>$_POST['gia_goc'],
            'gia_ban'=>$_POST['gia_ban'],
            'anh'=>$_POST['anh'],
            'xuat_xu'=>$_POST['xuat_xu'],  
            'trang_thai'=>$_POST['trang_thai']      
        ]);
     
        ManageFish::create([
            'ma_ca' =>$fishes->ma_ca,
            'ma_chi_nhanh' =>$_POST['ma_chi_nhanh'],
            'so_luong'=>$_POST['so_luong']
        ]);
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function editForm($ma_ca){
        
        $fish = Fish::find($ma_ca);
        $type = Type::orderByRaw('ten_loai ')->get();
        return view('fish.editform',[
            'fish'=>$fish,
            'type'=>$type
        ]);
    }

    public function saveEdit($ma_ca){
        $fishes = Fish::where('ten_ca',$_POST['ten_ca'])->first();
        $fish = Fish::find($ma_ca);

        if(isset($fishes) && $fishes->ma_ca != $ma_ca){
            header('location: ' . BASE_URL . 'ca/cap-nhat_id/'.$ma_ca.'?msg=Tên cá đã tồn tại');
            die;
        }
        $fish->ten_ca =$_POST['ten_ca'];
        $fish->gia_ban =$_POST['gia_ban'];
        $fish->gia_goc =$_POST['gia_goc'];
        if($_POST['anh']){
            $fish->anh =$_POST['anh'];
        }
        if($_POST['trang_thai']){
            $fish->trang_thai =$_POST['trang_thai'];
        }
        if($_POST['ma_loai']){
            $fish->ma_loai =$_POST['ma_loai'];
        }
        $fish->xuat_xu =$_POST['xuat_xu'];

        
        $fish->save();
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function remove($ma_ca){
        Fish::destroy($ma_ca);
        Comment::where('ma_ca',$ma_ca)->delete();
        Content::where('ma_ca',$ma_ca)->delete();
        OrderDetail::where('ma_ca',$ma_ca)->delete();
        ManageFish::where('ma_ca',$ma_ca)->delete();
        Review::where('ma_ca',$ma_ca)->delete();

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

    public function fishBranch($ma_ca){
        $fish = Fish::find($ma_ca);
        $branch = Branch::all();
        return view('fish.fishbranch',[
            'fish' => $fish,
            'branch'=>$branch
        ]);
    }

    public function saveA($ma_ca){
        
        ManageFish::create([
            'ma_chi_nhanh'=>$_POST['ma_chi_nhanh'],
            'so_luong'=>$_POST['so_luong'],
            'ma_ca'=>$ma_ca
        ]);
        header('location: ' . BASE_URL . 'ca/chi-tiet_id/'.$ma_ca);
        die;
    }

    public function editF($ma_ca){
        $mana =  ManageFish::where('ma_ca',$ma_ca)->first();
        $branch = Branch::all();
        return view('fish.editbranch',[
            'mana' => $mana,
            'branch'=>$branch
        ]);
    }

    public function editbranch($ma_ca){
        $model =  ManageFish::where('ma_chi_nhanh', $_POST['ma_chi_nhanh'])->first();
       
        $mana = ManageFish::where('ma_ca',$ma_ca)->first();

       
        if( $_POST['ma_chi_nhanh']){
            $mana->ma_chi_nhanh = $_POST['ma_chi_nhanh'];
        }
        
        $mana->so_luong = $_POST['so_luong'];
        $mana->save();
        header('location: ' . BASE_URL . 'ca/chi-tiet_id/'.$ma_ca);
        die;
    }

    public function removeBranch($ma_chi_nhanh){
        $fish = ManageFish::where('ma_chi_nhanh',$ma_chi_nhanh)->first();
        $fish->delete();
        header('location: ' . BASE_URL . 'ca/chi-tiet_id/'.$fish->ma_ca);
        die;
    }
}
?>