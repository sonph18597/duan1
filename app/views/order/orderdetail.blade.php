@extends('layouts.main')
@section('content-title')
<h2>ĐƠN HÀNG CHI TIẾT</h2>
@endsection
@section('main-content')
    
    <div class="card">
        <div class="card-body">
            <h3>Mã đơn hàng : {{$order->ma_don_hang}}</h3>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><span  style="display: inline-block; width: 200px">Khách hàng : </span>   {{$order->user()->ho_ten}}</p>
            <p><span style="display: inline-block; width: 200px">Email : </span>  {{$order->user()->email}}</p>
            <p><span  style="display: inline-block; width: 200px">Địa chỉ người nhận : </span>   {{$order->dia_chi}}</p>
            <p><span  style="display: inline-block; width: 200px">Số điện thoại người nhận : </span>   {{$order->so_dien_thoai}}</p>
            <p><span  style="display: inline-block; width: 200px">Tổng tiền : </span>   {{$order->tong_tien}}</p>            
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table ">
                <thead>
                  <tr>
                    <th scope="col">Mã cá</th>
                    <th scope="col">Tên cá</th>
                    <th scope="col">Giá bán</th>
                    <th scope="col">Số lượng</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($orderDetail as $item)
                        <tr>
                            <th scope="row">{{$item->fish()->ma_ca}}</th>
                            <td>{{$item->fish()->ten_ca}}</td>
                            <td>{{$item->fish()->gia_ban}}</td>
                            <td>{{$item->so_luong}}</td>
                        </tr>
                    @endforeach
                
                </tbody>
              
              </table>
        </div>
    </div>
@endsection