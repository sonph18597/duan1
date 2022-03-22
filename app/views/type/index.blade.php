@extends('layouts.main')
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã loại</th>
        <th scope="col">Tên loại</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($type as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>
                    <a href="{{BASE_URL . 'loai-ca/cap-nhat_Sid'.$item->id}}">Sửa</a>
                    <a href="{{BASE_URL . 'loai-ca/xoa_Sid' . $item->id}}">Xóa</a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection