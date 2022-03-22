@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{$type->id}}" readonly>
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cá</label>
      <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$type->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection