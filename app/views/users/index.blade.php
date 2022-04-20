@extends('layouts.main')
@section('content-title')
<a href="{{BASE_URL . 'nguoi-dung/tao-moi'}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>
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
        <th>
            
        </th>
       
      </tr>
    </thead>
   
    <tbody>
        @foreach ($user as $item)
            <tr>
                <th scope="row">{{$item->ma_tai_khoan}}</th>
                <td>{{$item->ten_tai_khoan}}</td>
                <td>{{$item->email}}</td>
      
                <td>{{$item->ho_ten}}</td>
                <td>{{$item->so_dien_thoai}}</td>
                <td><img src="{{PUBLIC_URL . '/dist/img/' . $item->anh_dai_dien}}" width = '100px' height = '100px' alt=""></td>
                <td>{{$item->vai_tro}}</td>
                <td>
                    <a href="{{BASE_URL . 'nguoi-dung/cap-nhat_id/'.$item->ma_tai_khoan}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{BASE_URL . 'nguoi-dung/xoa_id/' . $item->ma_tai_khoan}} " onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection