<?php
namespace App\Controllers;

use App\Models\Type;

class TypeController{
    public function index(){
        // $type =  Type::all();
        return view('type.index')  ; 
    }
}
?>