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
                <th scope="row">{{$item->ma_loai}}</th>
                <td>{{$item->ten_loai}}</td>
                <td>
                    <a href="{{BASE_URL . 'loai-ca/cap-nhat_id'.$item->ma_loai}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{BASE_URL . 'loai-ca/xoa_id' . $item->ma_loai}}"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection