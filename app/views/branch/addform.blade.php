@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
   
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
      <input name="ma_tai_khoan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input name="dia_chi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection