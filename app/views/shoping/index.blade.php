@extends('layouts.client')
@section('client_content')

<?php

    $host='localhost';
    $dbname='du_an_1';
    $username='root';
    $password='';
    try {
        $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",$username,$password);
        // echo 'ket noi thnah conng';
    } catch (PDOException $e){
        echo 'loi ket noi' .$e->getMessage();
    }

    $ma_tai_khoan=$_SESSION['user']['ma_tai_khoan'];

    $sql = "SELECT * FROM don_hang WHERE ma_tai_khoan='$ma_tai_khoan'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $list_don_hang=$stmt->fetchAll();

    if(isset($_GET['ma_don_hang'])){
        $ma_don_hang=$_GET['ma_don_hang'];

        $sql = "SELECT so_luong,ten_ca,gia_ban,ca.ma_ca FROM chi_tiet_don_hang JOIN ca ON ca.ma_ca=chi_tiet_don_hang.ma_ca WHERE ma_don_hang='$ma_don_hang'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $list_ct_don_hang=$stmt->fetchAll();

        $sql = "SELECT tong_tien,trang_thai FROM don_hang WHERE ma_don_hang='$ma_don_hang'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $don_hang=$stmt->fetch();

    }
    

?>

<style>
    .detailAcc_option{ 
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
        display: flex;
        margin: 50px auto;
        width: 1400px;
        height: 600px;
    }
    .detailAcc_option img{
        border-radius:100px; 
        margin-top:10px; 
    }
    .chi-tiet{
        display: flex;
        flex:1;
        flex-direction: column;
    }
    h3,.mess{
        width: 1130px;
        margin-bottom:50px; 
        display: flex;
        justify-content: space-around;
    }
    .row{
        display: flex;
        margin: 10px 0;
    }
    .row>.ten{
        width: 35%;
        text-align: center;
    }
    .row>.sl{
        width: 15%;
    }
    .row>.gia{
        width: 20%;
    }
    .row>.tien{
        width: 20%;
    }
    .row>.ma-don{
        width: 8%;
        text-align: center;
    }
    .row>.ngay{
        width: 12%;
    }
    .row>.dia-chi{
        width: 35%;
    }
    .row>.sdt{
        width: 12%;
    }
    .row>.tong-tien{
        width: 10%;
    }
    .row>.trang-thai{
        width: 12%;
    }
    .chi-tiet>.tong-tien{
        display: flex;
        justify-content: flex-end;
        margin-right:50px; 
    }
    .bodyAcc img{
        width: 215px;
        height: 215px;
    }
</style>
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
    <div class="chi-tiet">
        <?php if(!isset($_GET['ma_don_hang'])){ ?>
            <h3>Đơn hàng của tôi</h3>
            <?php if(isset($list_don_hang)){ ?>
                <div class="container">
                    <div class="row"> 
                        <div class="ma-don"><b>Mã đơn</b></div> 
                        <div class="ngay"><b>Ngày lên đơn</b></div> 
                        <div class="dia-chi"><b>Địa chỉ</b></div> 
                        <div class="sdt"><b>Số điện thoại</b></div>
                        <div class="tong-tien"><b>Tổng tiền</b></div>
                        <div class="trang-thai"><b>Trạng thái</b></div>
                        <div class="xem-chi-tiet"></div>
                    </div> 
                    <hr>
                    @foreach($list_don_hang as $don_hang)
                        <div class="row">
                            <div class="ma-don"><?php echo $don_hang['ma_don_hang'] ?></div> 
                            <div class="ngay"><?php echo $don_hang['ngay_len_don'] ?></div> 
                            <div class="dia-chi"><?php echo $don_hang['dia_chi'] ?></div> 
                            <div class="sdt"><?php echo $don_hang['so_dien_thoai'] ?></div>
                            <div class="tong-tien"><?php echo number_format($don_hang['tong_tien'], 0, '', ",")." đ" ?></div>
                            <div class="trang-thai"><?php echo $don_hang['trang_thai'] ?></div>
                            <a href="{{ BASE_URL. 'chi-tiet-don-hang?ma_don_hang='}}<?php echo $don_hang['ma_don_hang'] ?>" class="xem-chi-tiet">xem chi tiết</a>
                        </div>
                        <hr>
                    @endforeach
                </div>
            <?php } else { ?>
                    <div class="mess"> Bạn chưa thêm sản phẩm nào </div>
            <?php } ?>
        <?php } else { ?>
            <h3>Chi tiết đơn hàng</h3>
            <div class="container">
                <div class="row"> 
                    <div class="ten"><b>Tên cá</b></div> 
                    <div class="sl"><b>Số lượng</b></div> 
                    <div class="gia"><b>Giá bán</b></div> 
                    <div class="tien"><b>thành tiền</b></div> 
                </div> 
                <hr>
                @foreach($list_ct_don_hang as $product)
                    <div class="row">
                        <div class="ten"><?= $product['ten_ca'] ?></div>
                        <div class="sl"><?= $product['so_luong'] ?></div>
                        <div class="gia"><?= number_format($product['gia_ban'], 0, '', ",")." đ" ?></div>
                        <div class="tien"><?= number_format($product['gia_ban']*$product['so_luong'], 0, '', ",")." đ" ?></div>
                        @if($don_hang['trang_thai']=="Đã hoàn thành")
                            <?php
                                $ma_ca=$product['ma_ca'];
                                $sql = "SELECT * FROM danh_gia WHERE ma_don_hang='$ma_don_hang' AND ma_ca='$ma_ca'";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $danh_gia=$stmt->fetch();
                            ?>
                            <?php if($danh_gia == false){ ?>
                                <div><a href="{{ BASE_URL. 'danh-gia-san-pham?ma_don_hang='.$ma_don_hang.'&ma_ca='.$ma_ca}}">đánh giá</a></div>
                            <?php } else { ?>
                                <div>đã đánh giá</div>
                            <?php } ?>
                        @endif
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="tong-tien"><span>Tổng: <?php echo number_format($don_hang['tong_tien'], 0, '', ",")." đ" ?> </span></div>
        <?php } ?>
    </div>
</div>





@endsection