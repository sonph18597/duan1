@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    @if (isset($_GET['msg']))
       <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$type->ma_loai}}" readonly>
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cá</label>
      <input name="ten_loai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$type->ten_loai}}">
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection