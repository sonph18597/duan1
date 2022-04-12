<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\Fish;
use App\Models\Type;

class StatisticalController{
    public function index(){
        $branch = Branch::all();
        return view('statistical.index',[
            'branch' => $branch,
        ]);
    }

    public function detail($ma_loai){
        $fish = Fish::where('ma_loai',$ma_loai)->get();
        return view('statistical.detail',[
            'fish'=>$fish,
        ]);
    }
}
?>