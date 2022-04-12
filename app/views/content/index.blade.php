@extends('layouts.main')
@section('content-title')
<a href="{{BASE_URL . 'bai-viet/tao-moi'}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã bài viết</th>
        <th scope="col">Tiêu đề </th>
     
        <th scope="col">Ảnh</th>
        <th scope="col">Người viết</th>
        <th scope="col">Lượt xem</th>
        <th scope="col">Cá</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($content as $item)
            <tr>
                <th scope="row">{{$item->ma_bai_viet}}</th>
                <td>{{$item->tieu_de}}</td>
              
                <td><img src="{{PUBLIC_URL . '/img/' . $item->anh}}" width = '100px' height = '100px' alt=""></td>

                <td>{{$item->user()->ho_ten}}</td>
                <td>{{$item->luot_xem}}</td>
                <td>{{$item->fish()->ten_ca}}</td>

                <td>
                    <a href="{{BASE_URL . 'bai-viet/cap-nhat_id/'. $item->ma_bai_viet}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{BASE_URL . 'bai-viet/xoa_id/' . $item->ma_bai_viet}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection