@extends('layouts.main')
@section('content-title')
Thống kê
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã chi nhánh</th>
        <th scope="col">Tên chi nhánh</th>
        <th scope="col">Số đơn Tháng {{date('m')}}</th>
        <th scope="col">Số tiền thu được Tháng {{date('m')}}</th>
        
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
   
        @foreach ($branch as $item)
            <tr>
                <th scope="row">{{$item->ma_chi_nhanh}}</th>
                <td>{{$item->ten_chi_nhanh}}</td>
                <td>{{$item->demSodon($item->ma_chi_nhanh) }} </td>
                <td>{{$item->demTien($item->ma_chi_nhanh)}}</td>
                <td>
                    <a href="{{BASE_URL . 'thong-ke/chi-tiet_id/'.$item->ma_chi_nhanh}}"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                </td>
            </tr>
        @endforeach
   

    </tbody>
  </table>

@endsection