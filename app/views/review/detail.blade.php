@extends('layouts.main')
@section('content-title')
MÃ ĐÁNH GIÁ {{$ma_danh_gia}}
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã đánh giá</th>
        <th scope="col">Ngày đánh giá</th>
        <th scope="col">Ảnh</th>
        
        <th scope="col">Người phản hồi</th>
        
     
      </tr>
    </thead>
    <tbody>
   
        @foreach ($review as $item)
        
            <tr>
              <th scope="row">{{$item->ma_danh_gia}}</th>
              <td>{{$item->ngay_danh_gia}}</td>
              <td><img src="{{PUBLIC_URL . '/img/' . $item->anh}}" width = '100px' height = '100px' alt=""></td>
              <td>{{$item->user()->ho_ten}}</td>
        
              <td>
                <a href="{{BASE_URL . 'xoa-danh-gia-phan-hoi_id/' . $item->ma_phan_hoi}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
              </td>
          </tr>
      
          
        @endforeach
   

    </tbody>
  </table>

@endsection