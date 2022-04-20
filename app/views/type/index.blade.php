@extends('layouts.main')
@section('content-title')
<a href="{{BASE_URL . 'loai-ca/tao-moi'}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã loại</th>
        <th scope="col">Tên loại</th>
        <th scope="col">Tên loại cha</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
   
        @foreach ($type as $item)
            <tr>
                <th scope="row">{{$item->ma_loai}}</th>
                <td>{{$item->ten_loai}}</td>
               
                @if ($item->ma_loai_cha == 0)
                    <td>Null</td>
                @else
                      <td>{{$item->type()->ten_loai}}</td>
                @endif
                </td>
                <td>
                    <a href="{{BASE_URL . 'loai-ca/cap-nhat_id/'.$item->ma_loai}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{BASE_URL . 'loai-ca/xoa_id/' . $item->ma_loai}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
   

    </tbody>
  </table>

@endsection