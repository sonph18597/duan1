@extends('layouts.client')
@section('client_content')

<div class="login_container">
  <div class="row">
      <div class="col-md-6 mx-auto" id="form">
          <form action="" method="post" >
              <h2> Đăng nhập</h2>
              @if (isset($_GET['msg']))
              <p class="text-danger"><?= $_GET['msg'] ?></p>
            @endif
              <p><label> Tài khoản</label></p>
              <p> <input type="text" placeholder="Nhập tài khoản" required name="ten_tai_khoan"></p>
              <p><label> Mật Khẩu</label></p>
              <p><input type="password" placeholder=" Nhập mật khẩu" required name="mat_khau" ></p>
              <input type="checkbox"> <a href="#">  Lưu tài khoản </a>
              <div>
                  <button type="submit"> Đăng Nhập</button>
              </div>
              <a href="{{BASE_URL.'dang-ki'}}">đăng kí tài khoản</a>
              </form>
      
      </div>
  </div>
  </div>
@endsection