@extends('layouts.main')
@section('main-content')
<form method="POST" action="{{BASE_URL.'loai-ca/tao-moi'}}">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cá</label>
      <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection