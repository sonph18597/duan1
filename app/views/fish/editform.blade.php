@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
{{-- MSG --}}
@if (isset($_GET['msg']))
<p class="text-danger"><?= $_GET['msg'] ?></p>
@endif
       
{{-- tên cá  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên cá</label>
      <input name="ten_ca" value='{{$fish->ten_ca}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
{{-- loại cá --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại</label>
      <br>
      <select class="form-select" name='ma_loai' value ="{{$fish->ma_loai}}" aria-label="Default select example">
        <option value="" hidden></option>
        @foreach ($type as $item)
            <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
        @endforeach
      </select>
  </div>
{{-- Xuất xứ  --}}

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xuất sứ</label>
        <input name="xuat_xu" value='{{$fish->xuat_xu}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

{{-- Giá gốc  --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
        <input name="gia_goc" value='{{$fish->gia_goc}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

{{-- Giá bán  --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá bán</label>
        <input name="gia_ban" value='{{$fish->gia_ban}}' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

{{-- trạng thái  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
      <br>
      <select class="form-select" value='{{$fish->trang_thai}}' name='trang_thai' aria-label="Default select example">
        <option value="" hidden></option>
        <option value="Hết hàng">Hết hàng</option>
        <option value="Còn hàng">Còn hàng</option>        
      </select>
    </div>

{{-- Ảnh  --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh" value='{{$fish->anh}}' type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection