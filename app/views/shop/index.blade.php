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
    }
    .row>div{
        text-align: center
    }
    .row>.ten{
        width: 35%;
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
    .thong-tin{
        display: flex;
        flex-direction: column;
        margin: 0 20%;
    }
    form>div{
        display: flex;
        margin: 10px 0;
    }
    form span{
        display: block;
        width: 150px;
    }
    form input{
        padding: 2px 5px;
        border-radius: 5px; 
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
</style>

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
                <?php $ma_ca = $product['ma_ca'];?>
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
                </div>
                <hr>
            @endforeach
            <h2>Thông tin đơn hàng</h2>
            <form class="thong-tin" action="{{BASE_URL.'app/views/shop/save-dat-hang.php'}}" method="post">
                <div>
                    <span>Họ tên:</span>
                    <input type="text" name="ho_ten" value="<?php echo $_SESSION['user']['ho_ten'] ?>" required>
                </div>
                <div>
                    <span>Địa chỉ:</span>
                    <input type="text" name="dia_chi" required>
                </div>
                <div>
                    <span>Số điện thoại:</span>
                    <input type="number" name="sdt" value="<?php echo $_SESSION['user']['so_dien_thoai'] ?>" required>
                </div>
                <button type="submit">Đặt hàng</button>
            </form>
        </div>
<?php } else { ?>
        <div class="mess"> Bạn chưa thêm sản phẩm nào </div>
<?php } ?>




@endsection