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
    $ma_don_hang=$_GET['ma_don_hang'];
    $ma_ca=$_GET['ma_ca'];
    if ($_POST['noi_dung'] != ""){
        $noi_dung=$_POST['noi_dung'];
        $ma_tai_khoan=$_SESSION['user']['ma_tai_khoan'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_danh_gia =  date("Y-m-d H:i:s");

        $sql = "INSERT INTO danh_gia (noi_dung,ngay_danh_gia,ma_tai_khoan,ma_ca,ma_don_hang) 
                        VALUES ('$noi_dung','$ngay_danh_gia','$ma_tai_khoan','$ma_ca','$ma_don_hang')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    header('location:'.BASE_URL.'chi-tiet-don-hang?ma_don_hang='.$ma_don_hang);
?>