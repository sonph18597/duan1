@extends('layouts.main')
@section('content-title')
Chi nhánh số : {{$branch->ma_chi_nhanh}}
@endsection
@section('main-content')
<table class="table ">

<thead>
    <tr>
        <th scope="col">Mã người dùng</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Email</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">Số điện thoại</th>
        <th scope="col">Hình ảnh</th>
        <th scope="col">Vai trò</th>
    
    </tr>
  </thead>
  <tbody>
      @foreach ($manage as $item)
          <tr>
              <th scope="row">{{$item->user()->ma_tai_khoan}}</th>
              <td>{{$item->user()->ten_tai_khoan}}</td>
              <td>{{$item->user()->email}}</td>
              <td>{{$item->user()->ho_ten}}</td>
              <td>{{$item->user()->so_dien_thoai}}</td>
              <td><img src="{{PUBLIC_URL . '/img/' . $item->user()->anh_dai_dien}}" width = '100px' height = '100px' alt=""></td>
              <td>{{$item->user()->vai_tro}}</td>
          </tr>
      @endforeach
  
   
  </tbody>
</table>
@endsection