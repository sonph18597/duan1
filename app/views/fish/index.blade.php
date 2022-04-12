@extends('layouts.main')
@section('content-title')
<a href="{{BASE_URL . 'ca/tao-moi'}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã cá</th>
        <th scope="col">Tên cá</th>
        <th scope="col">Loại cá</th>
        <th scope="col">Xuất sứ</th>
        <th scope="col">Giá gốc</th>
        <th scope="col">Giá bán</th>
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
                <th scope="row">{{$item->ma_ca}}</th>
                <td>{{$item->ten_ca}}</td>
                <td>{{$item->type()->ten_loai}}</td>
                <td>{{$item->xuat_xu}}</td>
                <td>{{$item->gia_goc}}</td>
                <td>{{$item->gia_ban}}</td>
                <td>{{$item->trang_thai}}</td>
                <td><img width = '100px' height='100px' src="{{PUBLIC_URL . '/img/' . $item->anh }} " alt=""></td>
                <td>{{$item->luot_xem}}</td>

                <td>
                    <a href="{{BASE_URL . 'ca/cap-nhat_id/'.$item->ma_ca}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{BASE_URL . 'ca/xoa_id/' . $item->ma_ca}} " onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                    <a href="{{BASE_URL . 'ca/chi-tiet_id/'.$item->ma_ca}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
                </td>
            </tr>
        @endforeach
    
      </tbody>
    </table>
 @endsection