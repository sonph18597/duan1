@extends('layouts.main')
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã chi nhánh</th>
        <th scope="col">Tên người dùng</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Hình</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($branch as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>     <?php // $item->id ?>
                <td>{{$item->user_id}}</td>
                <td>{{$item->address}}</td>
                <td><img width="100px" height="100px" src="{{PUBLIC_URL . '/img/'.$item->image}}" alt=""></td>
                
                <td>
                    <a href="{{BASE_URL . 'chi-nhanh/cap-nhat_id'.$item->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'chi-nhanh/xoa_id' . $item->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection