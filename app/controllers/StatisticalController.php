<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\Fish;
use App\Models\ManageBranch;
use App\Models\ManageFish;
use App\Models\Type;

class StatisticalController{
    public function index(){
        $branch = Branch::all();
        return view('statistical.index',[
            'branch' => $branch,
        ]);
    }

    public function detail($ma_chi_nhanh){
        $branch = Branch::where('ma_chi_nhanh',$ma_chi_nhanh)->first();
        $mana = ManageFish::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        return view('statistical.detail',[
            'branch'=>$branch,
            'mana'=>$mana,
        ]);
    }
}
?>