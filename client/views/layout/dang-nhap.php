<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="login">
    <div class="card" >
      <div class="card-header">
        TÀI KHOẢN
      </div>
      <hr>
      <div class="form-dn">
        <form >
            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" name="ma_kh"  class="form-control"> <br>
            </div>
            
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="mat_khau" id="lg" value="<?=$mat_khau?>" class="form-control">
            </div>
            <div class="form-group">
                
                <label for=""> <input name="ghi_nho" type="checkbox" checked>
                                        Ghi nhớ tài khoản?</label>
            </div>
            <button name="btn_login">Đăng nhập</button>
                <ul>
                    <li><a href="">Quên mật khẩu</a></li>
                    <li><a href="">Đăng kí thành viên</a></li>
                </ul>
        </form>
      </div>
    </div>
</div>
</body>
</html>