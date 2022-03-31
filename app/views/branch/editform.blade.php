@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mã chi nhánh</label>
        <input name="" readonly placeholder="{{$branch->ma_chi_nhanh}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
      <input name="ma_tai_khoan" value="{{$branch->ma_tai_khoan}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input name="dia_chi" value="{{$branch->dia_chi}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" value="{{$branch->image}}" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection