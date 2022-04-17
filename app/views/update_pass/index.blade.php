@extends('layouts.client')
@section('client_content')
<div class="login_container">
  <div class="row">
      <div class="col-md-6 mx-auto" id="form">
          <form action="" method="post">
   
            <h2> Cập Nhật Mật Khẩu</h2>
              <p><label>Mật Khẩu Cũ</label></p>
              <p><input type="password" placeholder=" Nhập mật khẩu" required name="mat_khau"></p>

                  @if (isset($_GET['msg']) && $_GET['idInput'] == 1)
                    <p class="text-danger"><?= $_GET['msg'] ?></p>
                  @endif

                <p><label>Mật Khẩu Mới</label></p>
                <p><input type="password" placeholder=" Nhập mật khẩu" required name="mat_khau_new"></p>
    
                      @if (isset($_GET['msg']) && $_GET['idInput'] == 2)
                        <p class="text-danger"><?= $_GET['msg'] ?></p>
                      @endif  

              <p><label>Nhập Lại Mật Khẩu Mới</label></p>
              <p><input type="password" placeholder=" Nhập lại mật khẩu" required name="re_mat_khau_new"></p>

                    @if (isset($_GET['msg']) && $_GET['idInput'] == 3)
                      <p class="text-danger"><?= $_GET['msg'] ?></p>
                    @endif
                <button type="submit">cập nhật mật khẩu</button>
        </form>
      
      </div>
  </div>
  </div>
@endsection
        
  