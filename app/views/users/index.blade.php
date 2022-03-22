@extends('layouts.main')
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã người dùng</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
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
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->user_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->pass}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->image}}</td>
                <td>{{$item->role}}</td>
                <td>
                    <a href="{{BASE_URL . 'nguoi-dung/cap-nhat_id'.$item->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'nguoi-dung/xoa_id' . $item->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection