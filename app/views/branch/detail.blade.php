@extends('layouts.main')
@section('content-title')
Chi nhánh số : {{$ma_chi_nhanh}}
@endsection
@section('main-content')

    <table class="table ">
        <thead>
        <tr>
            <th scope="col">Tên cá</th>            
            <th scope="col">Số lượng</th>
            <th>
            </th>
        
        </tr>
        </thead>
        <tbody>
            @foreach ($mana as $item)
                <tr>          
                    <td>{{$item->fish()->ten_ca}}</td>
                    <td>{{$item->so_luong}}</td>                    
                    <td>
                    <a href="{{BASE_URL . 'chi-nhanh/xoa-ca_id/' . $item->ma_ca_theo_chi_nhanh}} "  onclick="return confirm('Có không giữ xóa thì mất');"><button  type="button" class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection