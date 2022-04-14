@extends('layouts.main')
@section('content-title')
BÌNH LUẬN
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Mã cá</th>
        <th scope="col">Tên cá </th>
        <th scope="col">Số bình luận</th>
        <th>
        </th>
       
      </tr>
    </thead>
    <tbody>
        @foreach ($fish as $item)
            <tr>
                <th scope="row">{{$item->ma_ca}}</th>
                <td>{{$item->ten_ca}}</td>
                <td>{{$item->demBL()}}</td>
                @if ($item->demBL() == 0)
                    <td></td>
                @else
                <td>
                    <a href="{{BASE_URL . 'binh-luan/chi-tiet_id/'.$item->ma_ca}}"><button type="button" class="btn btn-primary">Chi tiết</button></a>
                    <a href="{{BASE_URL . 'binh-luan/xoa-all_id/' . $item->ma_ca}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                </td>
                @endif
              
            </tr>
        @endforeach
    
     
    </tbody>
  </table>
  @endsection