<?php
namespace App\Controllers;

use App\Models\Branch;
use App\Models\Fish;
use App\Models\ManageBranch;
use App\Models\ManageFish;
use App\Models\Type;
use App\Models\Order;

class StatisticalController{
    public function index(){
        $branch = Branch::all();
        return view('statistical.index',[
            'branch' => $branch,
        ]);
    }

    public function detail($ma_chi_nhanh){
        $order = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        $branch = Branch::where('ma_chi_nhanh',$ma_chi_nhanh)->first();
        return view('statistical.detail',[
            'order' => $order,
            'branch' => $branch
        ]);
    }
}
?>