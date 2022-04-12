@extends('layouts.main')
@section('content-title')
<h2>Bình luận chi tiết : {{$comment[0]->fish()->ten_ca}}</h2>
@endsection
@section('main-content')

<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã bình luận</th>
        <th scope="col">Nội dung </th>
        <th scope="col">Ngày bình luận</th>

        <th scope="col">Tên tài khoản</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($comment as $item)
        
            <tr>
                <th scope="row">{{$item->ma_binh_luan}}</th>
                <td>{{$item->noi_dung}}</td>
                <td>{{$item->ngay_binh_luan}}</td>
                <td>{{$item->user()->ho_ten}}</td>

                <td>
                    <a href="{{BASE_URL . 'binh-luan/tra-loi_id/'.$item->ma_binh_luan}}"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                    <a href="{{BASE_URL . 'binh-luan/xoa_id/' . $item->ma_binh_luan}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection