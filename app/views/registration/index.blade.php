@extends('layouts.client')
@section('client_content')
<div class="login_container">
  <div class="row">
      <div class="col-md-6 mx-auto" id="form">
          <form action="" method="post">
              <h2> Đăng Kí Tài Khoản Mới</h2>
              <p><label> Tài khoản</label></p>
              <p> <input type="text" placeholder="Nhập tài khoản" required name="ten_tai_khoan"></p>

                  @if (isset($_GET['msg']) && $_GET['idInput'] == 0)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
                  
              <p><label> Mật Khẩu</label></p>
              <p><input type="password" placeholder=" Nhập mật khẩu" required name="mat_khau"></p>

                  @if (isset($_GET['msg']) && $_GET['idInput'] == 1)
                  <p class="text-danger"><?= $_GET['msg'] ?></p>
                @endif

              <p><label>Nhập Lại Mật Khẩu</label></p>
              <p><input type="password" placeholder=" Nhập lại mật khẩu" required name="re_mat_khau"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 2)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <p><label> Họ Tên</label></p>
              <p> <input type="text" placeholder="Nhập Họ Tên" required name="ho_ten"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 3)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <p><label> Số Điện Thoại</label></p>
              <p><input type="text" placeholder=" Nhập Số Điện Thoại" required name="so_dien_thoai"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 4)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <p><label> Email</label></p>
              <p><input type="email" placeholder=" Nhập Email" required name="email"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 5)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <input type="checkbox"> <a href="#">  Lưu tài khoản </a>
              <div>
                  <button type="submit">Đăng Kí</button>
              </div>
        </form>
      
      </div>
  </div>
  </div>
@endsection
        
  