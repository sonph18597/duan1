<?php
    require ("../../../commons/helpers.php");
    session_start();

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
    $dia_chi=$_POST['dia_chi'];
    $sdt=$_POST['sdt'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay_len_don =  date("Y-m-d H:i:s");
    $trang_thai = 'chờ xác nhận';
    $tong_tien = 0;
    foreach($_SESSION['shoping'] as $product){
        $tong_tien=$tong_tien+$product['so_luong']*$product['gia_ban'];
    }

    $sql = "INSERT INTO don_hang (ngay_len_don,tong_tien,trang_thai,dia_chi,so_dien_thoai,ma_tai_khoan,ma_chi_nhanh) 
                    VALUES ('$ngay_len_don',$tong_tien,'$trang_thai','$dia_chi','$sdt','$ma_tai_khoan',1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "SELECT ma_don_hang FROM don_hang WHERE ngay_len_don='$ngay_len_don'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $ma_don_hang = $stmt->fetch()[0];
    foreach($_SESSION['shoping'] as $product){
        $ma_ca=$product['ma_ca'];
        $so_luong=$product['so_luong'];
        $sql = "INSERT INTO chi_tiet_don_hang (ma_ca,ma_don_hang,so_luong) 
                    VALUES ('$ma_ca','$ma_don_hang','$so_luong')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    $_SESSION['shoping']=null;

    header('location:'.BASE_URL.'gio-hang?mess=đặt hàng thành công');
?>