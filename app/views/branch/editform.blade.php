@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mã chi nhánh</label>
        <input name="id" readonly placeholder="{{$branch->id}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
      <input name="user_id" value="{{$branch->user_id}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
        <input name="address" value="{{$branch->address}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" value="{{$branch->image}}" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection