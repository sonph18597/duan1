@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    {{-- msg --}}
    @if (isset($_GET['msg']))
        <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
      {{-- tên tài khoản  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
      <input name="ten_tai_khoan" value='{{$user->ten_tai_khoan}}'  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- email  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" type="text"value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- tên người dùng  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
        <input name="ho_ten" type="text"value="{{$user->ho_ten}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- số điện thoại  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input name="so_dien_thoai" type="text"value="{{$user->so_dien_thoai}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- ảnh đại diện  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh_dai_dien" type="file" value="{{$user->anh_dai_dien}}"  >
    </div>
    {{-- Vai trò  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Vai trò</label>
        <select class="form-select"value="{{$user->vai_tro}}" aria-label="Default select example" name='vai_tro'>     
            <option value="{{$user->vai_tro}}"></option>
            <option value="Admin">Admin</option>
            <option value="Admin chi nhánh">Admin chi nhánh</option>
            <option value="Cộng tác viên">Cộng tác viên</option>
            <option value="Khách hàng">Khách hàng</option>
          </select>
      </div>

      {{-- buttom  --}}
    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
@endsection