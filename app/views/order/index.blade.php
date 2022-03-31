@extends('layouts.main')
@section('content-title')
<h2>ĐƠN HÀNG</h2>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã đơn hàng</th>
        <th scope="col">Người thanh toán</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Ngày lên đơn</th>
        <th scope="col">Chi nhánh</th>
        <th>
        </th>
      </tr>
    </thead>
    <tbody>
        @foreach ($order as $item)
            <tr>
                <th scope="row">{{$item->ma_don_hang}}</th>
                <td>{{$item->user()->ho_ten}}</td>
                <td>{{$item->trang_thai}}</td>
                <td>{{$item->tong_tien}}</td>
                <td>{{$item->ngay_len_don}}</td>
                <td>{{$item->branch()->dia_chi}}</td>
                
                <td>
                    <a href="{{BASE_URL .  'don-hang-chi-tiet_id/'. $item->ma_don_hang}}"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                    <a href="{{BASE_URL . 'don-hang/xoa_id/' . $item->ma_don_hang}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection