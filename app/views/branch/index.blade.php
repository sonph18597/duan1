@extends('layouts.main')
@section('content-title')
<a href="{{BASE_URL . 'chi-nhanh/tao-moi'}}"><button type="button" class="btn btn-primary">Tạo mới</button></a>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã chi nhánh</th>
        <th scope="col">Tên chi Nhánh</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Hình</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($branch as $item)
            <tr>
                  
                <td>{{$item->ma_chi_nhanh}}</td>
                <td>{{$item->ten_chi_nhanh}}</td>
                <td>{{$item->dia_chi}}</td>
                <td><img width="100px" height="100px" src="{{PUBLIC_URL . '/img/'.$item->anh}}" alt=""></td>        
                <td>
                  <a href="{{BASE_URL . 'chi-nhanh/cap-nhat_id/'.$item->ma_chi_nhanh}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                  <a href="{{BASE_URL . 'chi-nhanh/xoa_id/' . $item->ma_chi_nhanh}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                  <a href="{{BASE_URL . 'chi-nhanh/chi-tiet_id/'.$item->ma_chi_nhanh}}"><button type="button" class="btn btn-info">Chi tiết</button></a>
                </td>
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection