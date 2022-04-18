@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    {{-- MSG  --}}
    @if (isset($_GET['msg']))
        <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
    {{-- tên tài khoản  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
      <input name="ten_tai_khoan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- Email  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- Mật khẩu  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mật Khẩu</label>
        <input name="mat_khau" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- họ tên  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
        <input name="ho_ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- số điện thoại  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input name="so_dien_thoai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- ảnh đại diện  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh_dai_dien" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    {{-- vai trò  --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Vai trò</label>
        <select class="form-select" aria-label="Default select example" name='vai_tro'>     
            <option value="Admin">Admin</option>
            <option value="Admin chi nhánh">Admin chi nhánh</option>
            <option value="Cộng tác viên">Cộng tác viên</option>
            <option value="Khách hàng">Khách hàng</option>
          </select>
      </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection