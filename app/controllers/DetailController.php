<?php
namespace App\Controllers;

use App\Models\Fish;

class DetailController{
    public function index(){
        return view('detail.index',[
        ]
        );
    }
}
?>