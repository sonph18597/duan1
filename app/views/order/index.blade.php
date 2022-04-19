@extends('layouts.main')
@section('content-title')
<h2>ĐƠN HÀNG NĂM {{date('Y')}}</h2>
@endsection
@section('main-content')
  @for ($i = 0; $i < date('m'); $i++)
    {{ 'Tháng : '.$i + 1  }}
      <table class="table ">
          <thead>
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Người thanh toán</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày lên đơn</th>
                <th scope="col">Chi nhánh</th>
                <th>
                </th>
              </tr>
          </thead>
          <tbody>
              @foreach ($order as $item)
                  @if (date('Y', strtotime($item->ngay_len_don)) == date('Y') )
                      @if (date('m', strtotime($item->ngay_len_don)) == ($i+1))
                      <tr>
                          <th scope="row">{{$item->ma_don_hang}}</th>
                          <td>{{$item->user()->ho_ten}}</td>
                          <td> <a href="{{BASE_URL .  'don-hang-trang-thai/'. $item->ma_don_hang}}">{{$item->trang_thai}}</a></td>
                          <td>{{$item->tong_tien}}</td>
                          <td>{{$item->ngay_len_don}}</td>
                          <td>{{$item->branch()->ten_chi_nhanh}}</td>               
                          <td>
                              <a href="{{BASE_URL .  'don-hang-chi-tiet_id/'. $item->ma_don_hang}}"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                              
                            </td>
                      </tr>
                      @endif
                  @endif
 
               @endforeach

          </tbody>
      </table>
  @endfor
@endsection