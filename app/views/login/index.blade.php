@extends('layouts.client')
@section('client_content')
<div class="login_container">
  <div class="row">
      <div class="col-md-6 mx-auto" id="form">
          <form method="POST">
              <h2> Đăng nhập</h2>
              <p><label> Tài khoản</label></p>
              <p> <input type="text" placeholder="Nhập tài khoản" name='ten_tai_khoan' required></p>
              <p><label> Mật Khẩu</label></p>
              <p><input type="password" placeholder=" Nhập mật khẩu" name='mat_khau'></p>
              <input type="checkbox"> <a href="#">  Lưu tài khoản </a>
              <div>
                  <button type="submit"> Đăng Nhập</button>
              </div>
              </form>
      
      </div>
  </div>
  </div>
@endsection
        
  