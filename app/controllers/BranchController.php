<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\Fish;
use App\Models\ManageBranch;
use App\Models\ManageFish;
use App\Models\Order;
use App\Models\OrderDetail;
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
                'dia_chi'=>$_POST['dia_chi'],
                'anh'=>$_POST['anh'],
                'ten_chi_nhanh'=>$_POST['ten_chi_nhanh']
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
        $branch->ten_chi_nhanh = $_POST['ten_chi_nhanh'];
        $branch->dia_chi = $_POST['dia_chi'];
        if( $_POST['anh']){
            $branch->anh = $_POST['anh'];
        }
        $branch->save();
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function remove($ma_chi_nhanh){
        $branch = Branch::where('ma_chi_nhanh',$ma_chi_nhanh)->first();
        $mana = ManageBranch::where('ma_chi_nhanh',$ma_chi_nhanh)->delete();
        $order = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        foreach($order as $m){
            $orderdetail = OrderDetail::where('ma_don_hang',$m->ma_don_hang)->delete();
            $m->delete();
        }
        
        $branch->delete();
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function detail($ma_chi_nhanh){
       
        $order = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        $mana = ManageFish::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        return view('branch.detail',[
            'ma_chi_nhanh' => $ma_chi_nhanh,
            'order' => $order,
            'mana' =>$mana,
        ]);
    }

    public function removeFish($ma_ca_theo_chi_nhanh){
        $mana =  ManageFish::where('ma_ca_theo_chi_nhanh',$ma_ca_theo_chi_nhanh)->first();
        $mana->delete();
        header('location: ' . BASE_URL . 'chi-nhanh/chi-tiet_id/' .$mana->ma_chi_nhanh);
        die;
    }
}
?>