@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên cá</label>
      <input name="ten_ca" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Loại cá</label>
        <input name="ma_loai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Màu sắc</label>
        <input name="mau" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xuất sứ</label>
        <input name="xuat_xu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kích thước</label>
        <input name="kich_thuoc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tuổi</label>
        <input name="tuoi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giải thưởng</label>
        <input name="giai_thuong" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
        <input name="gia_goc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá bán</label>
        <input name="gia_ban" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ngày nhập</label>
        <input name="ngay_nhap" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <input name="trang_thai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection