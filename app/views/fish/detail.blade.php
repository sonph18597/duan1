@extends('layouts.main')
@section('content-title')
<h2>Tênc cá: {{$fish->ten_ca}}</h2>
@endsection
@section('main-content')
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Chi nhánh</th>
        <th scope="col">Số lượng</th>
        
      
      </tr>
    </thead>
    <tbody>
        @foreach ($manage as $item)
            <tr>
                <th scope="row">{{$item->ma_chi_nhanh}}</th>
                <td>{{$item->so_luong}}</td>

            </tr>
        @endforeach
    
      </tbody>
    </table>
 @endsection