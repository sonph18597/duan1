<?php
namespace App\Controllers;

use App\Models\Branch;

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
            'user_id'=>$_POST['user_id'],
            'address'=>$_POST['address'],
            'image'=>$_POST['image']
        ]);

        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function editForm($id){
        $branch = Branch::find($id);
        return view('branch.editform',[
            'branch'=>$branch
        ]);
    }

    public function saveEdit($id){
        $branch = Branch::find($id);
        $branch->user_id = $_POST['user_id'];
        $branch->address = $_POST['address'];
        $branch->image = $_POST['image'];
        $branch->save();
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }

    public function remove($id){
        Branch::destroy($id);
        header('location: ' . BASE_URL . 'chi-nhanh');
        die;
    }
}
?>