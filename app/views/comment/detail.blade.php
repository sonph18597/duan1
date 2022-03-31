@extends('layouts.main')
@section('content-title')
BÌNH LUẬN
@endsection
@section('main-content')
<h2>Bình luận chi tiết : {{$comment[0]->fish()->ten_ca}}</h2>
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã bình luận</th>
        <th scope="col">Nội dung </th>
        <th scope="col">Ngày bình luận</th>
        <th scope="col">Mã trả lời</th>
        <th scope="col">Mã tài khoản</th>
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
                <td>{{$item->ma_tra_loi}}</td>
                <td>{{$item->user()->ho_ten}}</td>

                <td>
                    <a href="{{BASE_URL . 'binh-luan/xoa_id/' . $item->ma_binh_luan}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection