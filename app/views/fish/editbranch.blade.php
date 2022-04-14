@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
  {{-- msg --}}
@if (isset($_GET['msg']))
  <p class="text-danger"><?= $_GET['msg'] ?></p>
@endif
  {{-- Chi nhánh --}}

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Chi nhánh</label>
      <br>
      <select class="form-select" value='{{$mana->ma_chi_nhanh}}' name='ma_chi_nhanh' aria-label="Default select example">
        <option value="" hidden></option>
        @foreach ($branch as $item)
            <option value="{{$item->ma_chi_nhanh}}">{{$item->ten_chi_nhanh}}</option>
        @endforeach
      </select>
  </div>
{{-- Số lượng  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Số lượng</label>
      <input name="so_luong" value="{{$mana->so_luong}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>



@endsection