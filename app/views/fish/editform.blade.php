@extends('layouts.main')
@section('main-content')
<form method="POST" action="">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input readonly placeholder="{{$fish->id}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên cá</label>
      <input name="name" value='{{$fish->name}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Loại cá</label>
        <input name="type_id" value='{{$fish->type_id}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Màu sắc</label>
        <input name="color" value='{{$fish->color}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xuất sứ</label>
        <input name="country" value='{{$fish->country}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kích thước</label>
        <input name="size" type="text" value='{{$fish->size}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tuổi</label>
        <input name="age" type="text" value='{{$fish->age}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giải thưởng</label>
        <input name="prize" type="text" value='{{$fish->prize}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
        <input name="price_buy" value='{{$fish->price_buy}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá bán</label>
        <input name="price_sell" value='{{$fish->price_sell}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ngày nhập</label>
        <input name="date" type="date" value='{{$fish->date}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <input name="status" value='{{$fish->status}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" value='{{$fish->image}}' type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection