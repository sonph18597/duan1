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

    $ma_ca = $_GET['ma_ca'];
    if(isset($_GET['ma_tra_loi'])){
        $ma_tra_loi=$_GET['ma_tra_loi'];
    } else {
        $ma_tra_loi=0;
    }
    if ($_SERVER['REQUEST_METHOD']=="POST"){
        if ($_POST['noi_dung'] != ""){
            $noi_dung=$_POST['noi_dung'];
        } else {
            header('location:'.BASE_URL.'chi-tiet?ma_ca='.$ma_ca);
            die;
        }
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $ngay_binh_luan =  date("Y-m-d H:i:s");
        $ma_tai_khoan = $_SESSION['user']['ma_tai_khoan'];
        $sql = "INSERT INTO binh_luan (noi_dung,ngay_binh_luan,ma_tra_loi,ma_ca,ma_tai_khoan) 
                    VALUES ('$noi_dung','$ngay_binh_luan','$ma_tra_loi','$ma_ca','$ma_tai_khoan')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('location:'.BASE_URL.'chi-tiet?ma_ca='.$ma_ca);
    }
?>