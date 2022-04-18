@extends('layouts.client')
@section('client_content')
<div class="login_container">
  <div class="row">
      <div class="col-md-6 mx-auto" id="form">
          <form action="" method="post">

            <h2> Cập Nhật Tài Khoản</h2>
              <p><label> Họ Tên</label></p>
              <p> <input type="text" placeholder="Nhập Họ Tên" required name="ho_ten" value="{{$_SESSION ["user"]["ho_ten"]}}"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 3)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <p><label> Số Điện Thoại</label></p>
              <p><input type="text" placeholder=" Nhập Số Điện Thoại" required name="so_dien_thoai" value="{{$_SESSION ["user"]["so_dien_thoai"]}}"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 4)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <p><label> Email</label></p>
              <p><input type="email" placeholder=" Nhập Email" required name="email" value="{{$_SESSION ["user"]["email"]}}"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 5)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif
              
              <input type="checkbox"> <a href="#">  Lưu tài khoản </a>
              <div>
                  <button type="submit">cập nhật tài khoản</button>
              </div>
        </form>
      
      </div>
  </div>
  </div>
@endsection
        
  