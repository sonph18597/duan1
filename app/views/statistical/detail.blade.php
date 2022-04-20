@extends('layouts.main')
@section('content-title')
THỐNG KÊ CHI NHÁNH :  {{$branch->ten_chi_nhanh}}
@endsection
@section('main-content')
  <table class="table ">
      <thead> 
          <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Người đặt hàng</th>
        
            <th scope="col">Tổng tiền</th>
            <th scope="col">Ngày lên đơn</th>
         
           
          </tr>
      </thead>
        
              <tbody>
                  @foreach ($order as $item)
                    @if ($item->trang_thai == 'Đã hoàn thành')
                      <tr>
                        <th  scope="col">{{$item->ma_don_hang}}</th>
                        <td>{{$item->user()->ten_tai_khoan}}</td>
                        <td>{{$item->tong_tien}}</td>
                        <td>{{$item->ngay_len_don}}</td>
                      </tr>
                    
                    @endif
                   
                  @endforeach
              </tbody>
      
          
    </table>

@endsection