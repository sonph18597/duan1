@extends('layouts.client')
@section('client_content')
    <?php
        $anh = $_SESSION ["user"]["anh_dai_dien"];
    ?>
<div class="bodyAcc">
    <div class="detailAcc_option">
        <div>
            <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" alt="">
            <p><b><?php echo $_SESSION ["user"]["ten_tai_khoan"]?></b></p>
            <br>
            <br>
        </div>
            <?php if ($_SESSION ["user"]["vai_tro"] == "Admin" || $_SESSION ["user"]["vai_tro"] == "Admin chi nhánh") :?>
                    <div> <a href="{{ BASE_URL. 'ca'}}">TRANG QUẢN TRỊ </a> </div> <br>
            <?php endif;?>

            <?php if ($_SESSION ["user"]["vai_tro"] == "Admin" || $_SESSION ["user"]["vai_tro"] == "Admin chi nhánh" || $_SESSION ["user"]["vai_tro"] == "cộng tác viên" ):?>
                <div><a href="{{ BASE_URL. 'chi-tiet-don-hang'}}">ĐƠN HÀNG CỦA TÔI</a></div> <br>
            <?php endif;?>
                <div><a href="{{ BASE_URL. 'cap-nhat-mat-khau'}}">ĐỔI MẬT KHẨU</a></div> <br>
            <div> <a href="{{ BASE_URL. 'cap-nhat-tai-khoan'}}">THAY ĐỔI THÔNG TIN CỦA BẠN</a></div> <br>
            <div> <a href="{{ BASE_URL. 'dang-xuat'}}">ĐĂNG XUẤT</a></div> <br>
    </div>
    <div class="profile">
        <div class="master">
            <h4> <b>Hồ Sơ Của Tôi</b> </h4>
            <p>Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <div class="info">
            <p><b>tên tài khản: &nbsp; </b>  <?php echo $_SESSION ["user"]["ten_tai_khoan"]?></p>
            <p><b>họ tên: &nbsp;</b> <?php echo $_SESSION ["user"]["ho_ten"]?></p>
            <p><b>số điện thoại: &nbsp;</b> <?php echo $_SESSION ["user"]["so_dien_thoai"]?></p>
            <p><b>email: &nbsp;</b><?php echo $_SESSION ["user"]["email"]?></p>
            <p><b>vai trò: &nbsp;</b><?php echo $_SESSION ["user"]["vai_tro"]?></p>
        </div>
        <div class="avt">
            
            <form action="" method="post" enctype='multipart/form-data'>
                
                
                <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" alt=""><br>
                <input type="file" style="margin-top: 5px;" required name="img_up"> đổi ảnh avt 
                <input type="submit" >
            </form>
        </div>
       
    </div>
</div>



<style>
.detailAcc_option{
    margin-left:-62px; 
    margin-top:18px ;
    text-align: center;
    width: 270px;
    float: left;
    color: black;
    background-color: rgba(10, 146, 219, 0.268); 
    border-radius: 40px;
}
.detailAcc_option a{
    color: black;
    
}
.detailAcc_option a:hover{
    font-weight: 700;
}
.bodyAcc{
    margin: 10 auto;
    width: 1300px;
    height: 600px;
}
.profile{
    display: block;
    height: 600px ;
    width: 980px;
    float: right;
}
.profile p{
    margin-left: 25px;
    font-size: 110%;
}
.profile h4{        
    margin-left: 25px;
    margin-top: 20px;  
}
.avt{
    text-align: center;
    display: block;
    float: right;
    margin-right:25px ; 
    width: 400px;
    border-left: 1px solid ;
    margin-top:10px; 

}
.info{
 float: left;
 margin-top:10px; 
}
input[type=file]{
    width: 90px;
}
.detailAcc_option img{
    border-radius:100px; 
    margin-top:10px; 
}
.master{
    border-bottom:2px solid rgb(174, 172, 172); 
}
</style>
@endsection