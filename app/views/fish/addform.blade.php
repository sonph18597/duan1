@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên cá</label>
      <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Loại cá</label>
        <input name="type_id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Màu sắc</label>
        <input name="color" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xuất sứ</label>
        <input name="country" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kích thước</label>
        <input name="size" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tuổi</label>
        <input name="age" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giải thưởng</label>
        <input name="prize" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
        <input name="price_buy" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá bán</label>
        <input name="price_buy" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ngày nhập</label>
        <input name="date" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <input name="status" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection