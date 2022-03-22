<?php
namespace App\Controllers;

use App\Models\Fish;

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
            'type_id'=>$_POST['type_id'],
            'name'=>$_POST['name'],
            'size'=>$_POST['size'],
            'age'=>$_POST['age'],
            'prize'=>$_POST['prize'],
            'price_buy'=>$_POST['price_buy'],
            'price_sell'=>$_POST['price_sell'],
            'image'=>$_POST['image'],
            'status'=>$_POST['status'],
            'country'=>$_POST['country'],
            'date'=>$_POST['date'],
        ]);
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function editForm($id){
        
        $fish = Fish::find($id);

        return view('fish.editform',[
            'fish'=>$fish,
        ]);
    }

    public function saveEdit($id){
        $fish = Fish::find($id);
        $fish->type_id =$_POST['type_id'];
        $fish->name =$_POST['name'];
        $fish->size =$_POST['size'];
        $fish->age =$_POST['age'];
        $fish->prize =$_POST['prize'];
        $fish->price_buy =$_POST['price_buy'];
        $fish->price_sell =$_POST['price_sell'];
        $fish->image =$_POST['image'];
        $fish->status =$_POST['status'];
        $fish->country =$_POST['country'];
        $fish->date =$_POST['date'];

        $fish->save();
        header('location: ' . BASE_URL . 'ca');
        die;

    }

    public function remove($id){
        Fish::destroy($id);
        header('location: ' . BASE_URL . 'ca');
        die;

    }
}
?>