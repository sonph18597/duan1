<?php
namespace App\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;

class OrderController{
    public function index(){
        $order = Order::all();
        
        return view('order.index',[
            'order' => $order
        ]);
    }
    
    public function orderDetail($ma_don_hang){
        $orderDetail = OrderDetail::where('ma_don_hang',$ma_don_hang)->get();
        
        $order = Order::find($ma_don_hang);
        return view('order.orderdetail',[
            'orderDetail' => $orderDetail,
            'order' => $order
        ]);
    }
}
?>