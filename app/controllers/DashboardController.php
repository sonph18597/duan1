<?php
namespace App\Controllers;

use Illuminate\Support\Facades\Redirect;

class DashboardController{
    public function index(){
        return view('admin.index');
    }
}
?>