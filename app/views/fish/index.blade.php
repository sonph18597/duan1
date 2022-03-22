@extends('layouts.main')
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã cá</th>
        <th scope="col">Tên cá</th>
        <th scope="col">Loại cá</th>
        <th scope="col">Màu</th>
        <th scope="col">Xuất sứ</th>
        <th scope="col">Kích thước</th>
        <th scope="col">Tuổi</th>
        <th scope="col">Giải thưởng</th>
        <th scope="col">Giá gốc</th>
        <th scope="col">Giá bán</th>
        <th scope="col">Ngày nhập</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Số lượt xem</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($fish as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->type_id}}</td>
                <td>{{$item->color}}</td>
                <td>{{$item->country}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->prize}}</td>
                <td>{{$item->price_buy}}</td>
                <td>{{$item->price_sell}}</td>
                <td>{{$item->date}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->image}}</td>
                <td>{{$item->view}}</td>

                <td>
                    <a href="{{BASE_URL . 'ca/cap-nhat_id'.$item->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'ca/xoa_id' . $item->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection