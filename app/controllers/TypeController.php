<?php
namespace App\Controllers;

use App\Models\Type;

class TypeController{
    public function index(){
        $type =  Type::all();
        return view('type.index',[
            'type' => $type
        ])  ; 
    }

    public function addForm(){
        return view('type.addform') ; 
    }

    public function saveAdd(){
        Type::create([
            'ten_ca' => $_POST['ten_ca']
        ]);
        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }

    public function editForm($id){
       $type = Type::find($id);
      
       if(!$type){
            header('location: ' . BASE_URL . 'loai-ca');
       }else{
            return view('type.editform',[
                'type' => $type
            ]);
       }
    }

    public function saveEdit($id){
        $type = Type::find($id);
        $type->ten_ca = $_POST['ten_ca'];
        $type->save();
        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }

    public function remove($id){
        Type::destroy($id);
        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }
}
?>