@extends('layouts.main')
@section('content-title')
ĐÁNH GIÁ
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã đánh giá</th>
        <th scope="col">Ngày đánh giá</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Tên cá</th>
        <th scope="col">Tên khách hàng</th>
        <th scope="col">Mã phản hồi</th>
     
      </tr>
    </thead>
    <tbody>
   
        @foreach ($review as $item)
          @if ($item->ma_phan_hoi == 0)
            <tr>
              <th scope="row">{{$item->ma_danh_gia}}</th>
              <td>{{$item->ngay_danh_gia}}</td>
              <td><img src="{{PUBLIC_URL . '/img/' . $item->anh}}" width = '100px' height = '100px' alt=""></td>
              <td>{{$item->fish()->ten_ca}}</td>
              <td>{{$item->user()->ho_ten}}</td>
              <td>{{$item->ma_phan_hoi}}</td>
              <td>
                <a href="{{BASE_URL . 'tra-loi-danh-gia_id/' . $item->ma_danh_gia}} " ><button  type="button" class="btn btn-info">Chi tiết</button></a>
                <a href="{{BASE_URL . 'xoa-danh-gia_id/' . $item->ma_danh_gia}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>

              </td>
          </tr>
          @endif
          
        @endforeach
   

    </tbody>
  </table>

@endsection