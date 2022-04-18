@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
  {{--MSG--}}
  @if (isset($_GET['msg']))
       <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
  {{-- tên cá --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên cá</label>
      <input name="ten_ca" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
  {{-- loại cá --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên loại</label>
        <br>
        <select class="form-select" name='ma_loai' aria-label="Default select example">
          <option selected>Chọn loại</option>
          
          @foreach ($type as $item)
              <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
          @endforeach
        </select>
    </div>

  {{-- Xuất xứ --}}
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Xuất xứ</label>
        <input name="xuat_xu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

  {{-- giá gốc --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá gốc</label>
        <input name="gia_goc" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
  {{-- giá bán --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Giá bán</label>
        <input name="gia_ban" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
  {{-- trạng thái --}}

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
        <br>
        <select class="form-select" name='trang_thai' aria-label="Default select example">
          <option value="" hidden></option>
          <option value="Hết hàng">Hết hàng</option>
          <option value="Còn hàng">Còn hàng</option>        
        </select>
    </div>

  {{-- Chi nhánh --}}

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Chi nhánh</label>
      <br>
      <select class="form-select" name='ma_chi_nhanh' aria-label="Default select example">
          <option value="" hidden></option>
          @foreach ($branch as $item)
              <option value="{{$item->ma_chi_nhanh}}">{{$item->ten_chi_nhanh}}</option>
          @endforeach
      </select>
  </div>
{{-- Số lượng  --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Số lượng</label>
      <input name="so_luong" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
{{-- Ảnh --}}
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label><br>
        <input name="anh" type="file" multiple >
      </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>


@endsection