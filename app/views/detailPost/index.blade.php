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

    $id=$_GET['id'];
    $query = "SELECT * FROM bai_viet
              JOIN tai_khoan ON bai_viet.ma_tai_khoan=tai_khoan.ma_tai_khoan
              where ma_bai_viet='$id'
              ORDER BY   ma_bai_viet     
    ";
    $stmt = $conn -> prepare($query);
    $stmt -> execute();
    $post = $stmt -> fetch();
?>

<style>
    .main{
        display: flex;
        min-height:548px;
        width: 70%;
        flex-direction: column;
        margin: 50px auto;
    }
    .content,.img{
        text-align: center;
        margin-bottom: 50px;
    }
    
</style>

<div class="main">
    <h2 class="content"><?php echo $post['tieu_de'] ?></h2>
    <div class="img">
        <img src="{{PUBLIC_URL . 'images/'}}<?= $post['anh'] ?>" alt="" width="150px">
    </div>
    <div>
        <?php echo $post['noi_dung'] ?>
    </div>
</div>

@endsection