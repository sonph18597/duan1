<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\ManageBranch;
use App\Models\Users;


class BranchController{
    public function index(){
        $branch = Branch::all();
       
        return view('branch.index',[
            'branch'=>$branch
        ]);
    }

    public function addForm(){
        return view('branch.addform');
    }

    public function saveAdd(){
        Branch::create([
            'ma_tai_khoan'=>$_POST['ma_tai_khoan'],
            'dia_chi'=>$_POST['dia_chi'],
            'anh'=>$_POST['anh']
        ]);

        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function editForm($ma_chi_nhanh){
        $branch = Branch::find($ma_chi_nhanh);
        return view('branch.editform',[
            'branch'=>$branch
        ]);
    }

    public function saveEdit($ma_chi_nhanh){
        $branch = Branch::find($ma_chi_nhanh);
        $branch->ma_chi_nhanh = $_POST['ma_chi_nhanh'];
        $branch->dia_chi = $_POST['dia_chi'];
        if( $_POST['anh']){
            $branch->anh = $_POST['anh'];
        }
        $branch->save();
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function remove($ma_chi_nhanh){
        Branch::destroy($ma_chi_nhanh);
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function detail($ma_chi_nhanh){
        $branch = Branch::find($ma_chi_nhanh);
        $manage = ManageBranch::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        return view('branch.detail',[
            'branch' => $branch,
            'manage' => $manage,
        ]);
    }
}
?>