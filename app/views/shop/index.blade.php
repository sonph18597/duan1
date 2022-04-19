@extends('layouts.client')
@section('client_content')

<style>
    h2,.mess{
        display: flex;
        padding:50px 0;
        justify-content: space-around;
    }
    .row{
        display: flex;
        margin: 10px 0;
        justify-content: space-around;
    }
    .row>div{
        text-align: center
    }
    .row>.ten{
        width: 30%;
    }
    .row>.sl{
        width: 15%;
    }
    .row>.gia{
        width: 20%;
    }
    .row>.tien{
        width: 25%;
    }
    .row>.del{
        width: 10%;
    }
    .thong-tin{
        display: flex;
        flex-direction: column;
        margin: 0 20%;
    }
    form>div{
        display: flex;
        margin: 10px 0;
        width: 60%;
    }
    form .inf{
        width: 150px;
    }
    .thong-tin input{
        padding: 2px 5px;
        border-radius: 5px; 
        justify-content: space-around;

    }
    form button{
        width: 100px;
        margin:20px auto 50px;
        border-radius: 5px;
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
    .tong-tien{
        display: flex;
        justify-content: flex-end;
        margin-right:50px; 
    }
    
    .login>a{
        display: flex;
        justify-content: space-around;
        padding: 2px;
        margin:0 auto 50px; 
        border: 1px solid blue;
        width: 150px;
        border-radius:5px; 
    }
    .main{
        min-height: 528px;
    }
</style>
<div class="main">
    <h2>Giỏ hàng</h2>

    @if (isset($_GET['mess']))
        <div class="mess"><?php echo $_GET['mess'] ?></div>
    @endif
    <?php 
        if(isset($_SESSION['shoping']) && sizeof($_SESSION['shoping'])!=0){ ?>
            <div class="container">
                <div class="row"> 
                    <div class="ten"><b>Tên cá</b></div> 
                    <div class="sl"><b>Số lượng</b></div> 
                    <div class="gia"><b>Giá bán</b></div> 
                    <div class="tien"><b>thành tiền</b></div>
                    <div class="del"></div> 
                </div> 
                <hr>
                @foreach($_SESSION['shoping'] as $product)
                    <?php 
                        $ma_ca = $product['ma_ca'];
                        $tong_tien=0;
                    ?>
                    <div class="row">
                        <div class="ten"><?= $product['ten_ca'] ?></div>
                        <div class="sl">
                            <a href="{{BASE_URL.'app/views/shop/save-update-shoping.php?ma_ca='.$ma_ca.'&action=down'}}">-</a>
                            <?= $product['so_luong'] ?>
                            <a href="{{BASE_URL.'app/views/shop/save-update-shoping.php?ma_ca='.$ma_ca.'&action=up'}}">+</a>
                        </div>
                        <div class="gia"><?= number_format($product['gia_ban'], 0, '', ",")." đ" ?></div>
                        <div class="tien"><?= number_format($product['gia_ban']*$product['so_luong'], 0, '', ",")." đ" ?></div>
                        <div class="del"><a href="{{BASE_URL.'app/views/shop/save-update-shoping.php?ma_ca='.$ma_ca.'&action=delete'}}">xóa</a></div>
                        <?php $tong_tien = $tong_tien + $product['gia_ban']*$product['so_luong'] ?>
                    </div>
                    <hr>
                @endforeach
                <div class="tong-tien"><span>Tổng: <?php echo number_format($tong_tien, 0, '', ",")." đ" ?> </span></div>
                <?php if(isset($_SESSION['user'])){ ?>
                    <h2>Thông tin đơn hàng</h2>
                    <form class="thong-tin" action="{{BASE_URL.'app/views/shop/save-dat-hang.php'}}" method="post">
                        <div>
                            <div class="inf">Họ tên:</div>
                            <input type="text" name="ho_ten" value="<?php echo $_SESSION['user']['ho_ten'] ?>" required>
                        </div>
                        <div>
                            <div class="inf">Địa chỉ:</div>
                            <input type="text" name="dia_chi" required>
                        </div>
                        <div>
                            <div class="inf">Số điện thoại:</div>
                            <input type="number" name="sdt" value="<?php echo $_SESSION['user']['so_dien_thoai'] ?>" required>
                        </div>
                        <button type="submit">Đặt hàng</button>
                    </form>
                <?php } else { ?>
                    <div class="login">
                        <h2>Vui lòng đăng nhập</h2>
                        <a href="{{BASE_URL.'dang-nhap'}}"> Đăng nhập </a>
                    </div>
                    
                <?php } ?>
            </div>
    <?php } else { ?>
            <div class="mess"> Bạn chưa thêm sản phẩm nào </div>
    <?php } ?>
</div>




@endsection