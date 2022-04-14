<?php
namespace App\Controllers;

use App\Models\Fish;

class HomeController{
    public function index(){
        return view('home.index',[
        ]
        );
    }
}
?>