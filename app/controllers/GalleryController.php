<?php
namespace App\Controllers;
use App\model\gallery;
class GalleryController{
    public function index(){
        return view('gallery.index',[]
    );
    }
}
?>