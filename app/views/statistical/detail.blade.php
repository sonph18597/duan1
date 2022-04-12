@extends('layouts.main')
@section('content-title')
THỐNG KÊ CHI NHÁNH {{$branh->ten_chi_nhanh}}
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Tên cá</th>
        <th scope="col">Số lượng cá</th>
      
      </tr>
    </thead>
    <tbody>
        @foreach ($mana as $item)
            <tr>
                <th scope="row">{{$item->fish()->ten_ca}}</th>
                <td>{{}}</td>
            </tr>
        @endforeach
   

    </tbody>
  </table>

@endsection