@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
   {{-- MSG  --}}
    @if (isset($_GET['msg']))
      <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif

  
    {{-- Tên chi nhánh --}}
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên chi nhánh</label>
      <input name="ten_chi_nhanh" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    
  </div>
    {{-- địa chỉ --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input name="dia_chi" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      
    </div>
      
    {{-- Ảnh --}}
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="anh" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      
      </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection