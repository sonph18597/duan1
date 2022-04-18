@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    {{-- Mã chi nhánh --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên Chi nhánh</label>
      <input name="ten_chi_nhanh" value="{{$branch->ten_chi_nhanh}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- Địa chỉ --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input name="dia_chi" value="{{$branch->dia_chi}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
      {{-- ảnh --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" value="{{$branch->image}}" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection