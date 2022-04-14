@extends('layouts.main')
@section('content-title')
<h2>Tên cá: {{$fish->ten_ca}}</h2>
<a href="{{BASE_URL . 'ca/chi-nhanh_id/'.$fish->ma_ca}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>

@endsection
@section('main-content')

<table class="table ">
    <thead>
      <tr>
        <th scope="col">Tên chi nhánh</th>
        <th scope="col">Số lượng</th>
        <th>
        </th>
      
      </tr>
    </thead>
    <tbody>
        @foreach ($manage as $item)
            <tr>
                <th scope="row">{{$item->branch()->ten_chi_nhanh}}</th>
                <td>{{$item->so_luong}}</td>
                <td>
                  <a href="{{BASE_URL . 'ca/chi-nhanh-cap-nhat_id/'.$item->ma_ca}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                  <a href="{{BASE_URL . 'ca/chi-nhanh-xoa_id/' . $item->ma_chi_nhanh}} " onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
              </td>
            </tr>
        @endforeach
       
      </tbody>
    </table>
 @endsection