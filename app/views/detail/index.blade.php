@extends('layouts.client')
@section('client_content')
<style>
    .container{
        display: flex;      
    }

    .ca{
        width: 50%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }
    .ca2{
        width: 50%;
        background-color: black;
    }
    .ca .pro .img img{
        border-radius: 50px;
    }
    .info_detail{
        border: 1px solid rebeccapurple;
        border-radius: 5px;
        width: 450px;
        margin-top: 20px;
        padding:20px;
    }
    .comment form{
        display: flex;
    }
    .comment form button{
        margin-left: 5px;
    }
    .show_comment{
        display: flex;
        flex-direction: row;
        justify-content: space-around; 
    }
    .show_comment .user_comment img{
        border-radius: 50%;
    }
    .show_comment .text_comment {
        background-color: rgb(217, 223, 233);
    }
    .text_comment{
        border-radius: 10px;
        padding-top: 10px;
        padding: 0 10px;
    }

</style>
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
                $maca = $_GET['ma_ca'];                        
                $sql = "select * from ca WHERE ma_ca=$maca";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $fish = $stmt -> fetch();
?>
<h4> Thư Viện/Chi Tiết</h4>
<div class="container">
    <div class="ca">
            <div class="pro">
                <div class="img">
                    <img src="http://localhost/du-an-1/public/images/<?= $fish['anh'] ?>" width="450px" />
                </div>
                
                <div class="info_detail" >    
                    <span><h3>Thông tin chi tiết</h3></span>              
                    <div class="ten">
                        Tên Cá:
                        <?= $fish['ten_ca'] ?>
                        <div class="ten" style="color: red;">
                        Giá :
                            <?= number_format($fish['gia_ban'], 0, '', ",")." đ" ?><u></u>
                        </div>
                        Ngày Nhập:
                        <?= $fish['ngay_nhap'] ?>
                        <div>
                            Trạng Thái:
                            <?= $fish['trang_thai'] ?>
                        </div>
                        
                        <div>
                            Nguồn Gốc: <?= $fish['xuat_xu'] ?>
                        </div>
                    </div>
                </div>
            </div> 
        <div class="comment"> 
                <h2>Binh Luan</h2>
                <form action="" >
                    <textarea name="" id="" cols="48" rows="1" > </textarea>
                    <div>
                        <button type="submit"> Gửi</button>
                    </div> 
                </form>
                <div class="show_comment">
                    <?php                  
                        $sql = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi=0 ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $comments = $stmt -> fetchAll();
                    ?>  
                    @foreach ($comments as $comment)
                        <div class="user_comment">

                            <img src="{{PUBLIC_URL . '/images/0.jpg'}}" width="50px" height="50px" alt="">
                        </div>
                        <div class="text_comment">
                            <div>                           
                                <span><?= $comment['ten_tai_khoan']; ?></span>
                                <span><?= $comment['ngay_binh_luan'];?></span> 
                                <span><p><?= $comment['noi_dung']; ?></p></span>                                 
                            </div>                                            
                        </div>
                        <?php        
                            $id_rep_comments=$comment['ma_binh_luan'];           
                            $sql = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi= $id_rep_comments ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $rep_comments = $stmt -> fetchAll();
                        ?>
                        <div class="rep_comment">
                            @foreach ($rep_comments as $rep_comment)
                                <div class="user_comment">

                                    <img src="{{PUBLIC_URL . '/images/0.jpg'}}" width="50px" height="50px" alt="">
                                </div>
                                <div class="text_comment">
                                    <div>                           
                                        <span><?= $rep_comment['ten_tai_khoan']; ?></span>
                                        <span><?= $rep_comment['ngay_binh_luan'];?></span> 
                                        <span><p><?= $rep_comment['noi_dung']; ?></p></span>                                 
                                    </div>                                            
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                
        </div>
        
    </div>
    <div class="ca2">
    qeẻtyuii
    </div>
</div>
@endsection