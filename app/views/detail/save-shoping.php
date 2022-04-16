<?php
    require ("../../../commons/helpers.php");
    session_start();

    $ma_ca=$_GET['ma_ca'];

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

    $sql = "select * from ca WHERE ma_ca=$ma_ca";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $fish = $stmt -> fetch();

    
    $gia_ban=$_GET['gia_ban'];
    if (isset($_SESSION['shoping'])){
        if (!in_array($ma_ca,$_SESSION['shoping'])){
            $_SESSION['shoping'][$ma_ca]=array(
                "ten_ca" => $fish['ten_ca'],
                "ma_ca" => $ma_ca,
                "so_luong" => 1, 
                "gia_ban" => $gia_ban
            ); 
        };
    } else {
        $_SESSION['shoping'][$ma_ca]=array(
            "ten_ca" => $fish['ten_ca'],
            "ma_ca" => $ma_ca,
            "so_luong" => 1, 
            "gia_ban" => $gia_ban
        ); 
    };
    
    
    header('location:'.BASE_URL.'chi-tiet?ma_ca='.$ma_ca);
?>