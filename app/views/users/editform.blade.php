@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ID</label>
        <input  placeholder="{{$user->id}}" readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
      </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
      <input name="user_name" value='{{$user->user_name}}'  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input name="email" type="text"value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Password</label>
        <input name="pass" type="text"value="{{$user->pass}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tên người dùng</label>
        <input name="name" type="text"value="{{$user->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
        <input name="phone" type="text"value="{{$user->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình</label>
        <input name="image" type="file"value="{{$user->image}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Vai trò</label>
        <select class="form-select"value="{{$user->role}}" aria-label="Default select example" name='role'>     
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
      </div>


    <button type="submit" class="btn btn-primary">Lưu</button>
  </form>
@endsection