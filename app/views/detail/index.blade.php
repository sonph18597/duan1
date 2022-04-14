@extends('layouts.client')
@section('client_content')
<style>
    .ca{
        display: flex;     
        flex-direction: column;
    }
    h2{
        display: flex;
        padding:50px 0;
        justify-content: space-around;
    }
    .ca2{
        background-color: black;
    }
    .ca .pro .img{
        display: flex;
        align-items: center;
        border-radius: 50px;
        width: 450;
        height: 450;
        background-color: black;
    }
    .ca .pro{
        width: 100%;
        display: flex;
        justify-content: space-around; 

    }
    .info_detail{
        display:flex;
        flex-direction: column;
        border: 1px solid rebeccapurple;
        border-radius: 5px;
        min-width: 450px;
        padding:20px;
        align-items: center;
        justify-content:center;
    }
    .comment form{
        display: flex;
        
    }
    .comment form input{
        width: 600px;
        border-radius: 25px;
        padding: 0 20px;
    }
    .comment form button{
        margin-left: 10px;
        border-radius: 10px;
        width: 100px;
        height: 50px;
    }
    .show_comment{
        display: flex;
        flex-direction: column;
    }
    .show_comment>div{
        display: flex;
        padding: 10px 0;
    }
    .comment img{
        border-radius: 50%;
        margin-right: 10px;
    }
    .show_comment .text_comment {
        background-color: rgb(217, 223, 233);
    }
    .text_comment{
        border-radius: 10px;
        padding: 5px 10px 0;
        display: inline-block;
    }
    .text_comment p{
        margin:5px 0 10px 0;
    }
    .rep_comment{
        margin-left:50px;
    }
    .buy{
        padding: 2px 5px;
        border:1px solid blue;
        border-radius: 5px;
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
    function buy($id){
        
    }
                      
    $sql1 = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi=0 AND binh_luan.ma_ca=$maca ";
    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $comments = $stmt -> fetchAll();
                        
    $sql2 = "select * from bai_viet WHERE ma_ca=$maca LIMIT 3";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();
    $bai_viet = $stmt -> fetchAll();
?>
<h2>Thư Viện/<?= $fish['ten_ca'] ?></h4>
<div class="container">
    <div class="ca">
        <div class="pro">
                <div class="img">
                    <img src="http://localhost/du-an-1/public/images/<?= $fish['anh'] ?>" width="450px" />
                </div>
                
                <div class="info_detail">    
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
                    <a class="buy" href="" onclick="buy($maca)">Đặt mua</a>
                </div>

        </div> 
        <div class="comment"> 
                <h2>Bình luận</h2>
                <form action="" >
                    <img src="{{PUBLIC_URL . '/images/0.jpg'}}" alt="" width="50px" height="50px">
                    <input name="noi_dung">
                    <div>
                        <button type="submit">Gửi</button>
                    </div> 
                </form>
                
                <div class="show_comment">
                    <?php if ($comments){ ?>
                        @foreach ($comments as $comment)
                            <div>
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
                                
                            </div>
                            <?php
                                $id_rep_comments=$comment['ma_binh_luan'];           
                                $sql2 = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi= $id_rep_comments AND binh_luan.ma_ca=$maca";
                                $stmt = $conn->prepare($sql2);
                                $stmt->execute();
                                $rep_comments = $stmt -> fetchAll();
                            ?>
                            @foreach ($rep_comments as $rep_comment)
                                <div class="rep_comment">
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
                                </div>
                            @endforeach
                            
                        @endforeach
                    <?php } else {
                        echo "Sản phẩm chưa có bình luận nào";
                    } ?>
                </div>               
        </div>
        <div class="bai_viet">
            <h2>Bài viết liên quan</h2>
            <div></div>
        </div>       
    </div>
</div>
@endsection