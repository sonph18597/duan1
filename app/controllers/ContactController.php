<?php
namespace App\Controllers;

use App\Models\Fish;

class ContactController{
    public function index(){
        return view('contact.index',[
        ]
        );
    }
}
?>