@extends('layouts.client')
@section('client_content')
<style>
    .ca{
        display: flex;     
        flex-direction: column;
    }
    h2{
        padding:50px 0;
        text-align: center;
    }
    .ca2{
        background-color: black;
    }
    .ca .pro .img{
        display: flex;
        align-items: center;
        border-radius: 20px;
        width: 450;
        height: 450;
        background-color: black;
    }
    .ca .pro{
        width: 100%;
        display: flex;
        justify-content: space-around; 
        flex-wrap: wrap;
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
    .show_comment>.cmt,.rep_comment{
        display: flex;
        padding: 10px 0;
    }
    .comment img,.danh_gia img{
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
    .rep{
        display: none;
        margin-left:50px;
    }
    .button_reply{
        cursor: pointer;
        color: blue;
    }
    .buy{
        padding: 2px 5px;
        border:1px solid blue;
        border-radius: 5px;
    }
    .bai_viet{
        margin-bottom: 50px;
    }
    .bai_viet .img img{
        width: 100px;
        height: 100px;
        border-radius:10px;
        margin-right: 20px;  
    }
    .bai_viet>div{
        display: flex;
        margin-bottom:20px;
    }
    .bai_viet .tieu_de{
        background-color: rgb(217, 223, 233);
        flex: 1;
        border-radius:10px;
        padding: 10px; 
    }
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
    #so_luong{
        margin: 10px;
        width: 50px;
    }
    .so_luong span{
        padding: 0 5px;
        cursor: pointer;
    }
    .login{
        text-align: center;
        margin-bottom:20px; 
    }
    @media only screen and (max-width: 768px){
        .info_detail{
            margin-top: 50px;
        }
        .comment form button{
            width: 70px;
        }
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

    $ma_ca = $_GET['ma_ca'];
               
    $sql = "select * from ca WHERE ma_ca='$ma_ca'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $fish = $stmt -> fetch();
    $gia_ban=$fish['gia_ban'];
    $sql1 = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi=0 AND binh_luan.ma_ca='$ma_ca' ";

    $stmt = $conn->prepare($sql1);
    $stmt->execute();
    $comments = $stmt -> fetchAll();    
                       
    $sql2 = "select * from bai_viet WHERE ma_ca='$ma_ca' LIMIT 3";
    $stmt = $conn->prepare($sql2);
    $stmt->execute();

    $list_bai_viet = $stmt -> fetchAll();
    $sql3 = "select * from danh_gia JOIN tai_khoan ON danh_gia.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE danh_gia.ma_ca='$ma_ca' LIMIT 5";
    $stmt = $conn->prepare($sql3);
    $stmt->execute();
    $list_danh_gia = $stmt -> fetchAll(); 
?>
<script>
    function repCmt(id){
        let rep = document.getElementById(id);
        if (rep.style.display != "block") rep.style.display = "block";
            else rep.style.display = "none";
        console.log(rep);
    }
    function up(){
        document.getElementById("so_luong").value=Number(document.getElementById("so_luong").value)+1;
    }
    function down(){
        if (Number(document.getElementById("so_luong").value)>0)
            document.getElementById("so_luong").value=Number(document.getElementById("so_luong").value)-1;
    }
</script>
<h2>Thư viện/<?= $fish['ten_ca'] ?></h4>
<div class="container">
    <div class="ca">
        <div class="pro">
                <div class="img">
                    <?php if($fish['anh']){ ?>
                        <img src="{{PUBLIC_URL . 'images/'.$fish['anh']}}" width="450px" />
                    <?php } ?>
                </div>
                <div class="info_detail">    
                    <span><h3>Thông tin chi tiết</h3></span>              
                    <div class="ten">
                        Tên Cá: <?= $fish['ten_ca'] ?>
                        <div class="ten" style="color: red;">
                            Giá : <?= number_format($fish['gia_ban'], 0, '', ",")." đ" ?><u></u>
                        </div>
                        <div>
                            Nguồn Gốc: <?= $fish['xuat_xu'] ?>
                        </div>
                        <div>
                            Trạng Thái: <?= $fish['trang_thai'] ?>
                        </div>
                        
                    </div>
                    <a class="buy" href="{{BASE_URL.'app/views/detail/save-shoping.php?ma_ca='.$ma_ca.'&gia_ban='.$gia_ban}}">Đặt mua</a>
                </div>
        </div> 
        <div class="comment"> 
                <h2>Bình luận</h2>
                <?php if(isset($_SESSION['user'])){ ?>
                    <form action="{{BASE_URL.'app/views/detail/save-comment.php?ma_ca='.$ma_ca}}" method="POST">
                        <img src="{{PUBLIC_URL}}dist/img/{{$_SESSION['user']['anh_dai_dien']}}" alt="" width="50px" height="50px">
                        <input name="noi_dung">
                        <div>
                            <button type="submit">Gửi</button>
                        </div> 
                    </form>     
                <?php } else { ?>           
                    <div class="login">
                        <h5>Vui lòng đăng nhập để bình luận</h5>
                        <a href="{{BASE_URL.'dang-nhap'}}"> Đăng nhập </a>
                    </div>
                <?php } ?>
                <div class="show_comment">
                    <?php if ($comments){ ?>
                        @foreach ($comments as $comment)

                            <?php 
                                $ma_binh_luan=$comment['ma_binh_luan'];
                                $anh=$comment['anh_dai_dien'];
                            ?>
                            
                            <div class="cmt">
                                <div class="user_comment">
                                    <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" width="50px" height="50px" alt="">
                                </div>
                                <div class="text_comment">
                                    <div>                           
                                        <span><?= $comment['ho_ten']; ?></span>
                                        <span><?= $comment['ngay_binh_luan'];?></span> 
                                        <span><p><?= $comment['noi_dung']; ?></p></span>                                 
                                    </div>       
                                    <div><span onclick="repCmt(<?= $comment['ma_binh_luan'] ?>)" class="button_reply">trả lời</span></div>                                     
                                </div>
                            </div>
                            <div class="rep" id="<?= $comment['ma_binh_luan'] ?>">
                                <form action="{{BASE_URL.'app/views/detail/save-comment.php?ma_ca='.$ma_ca.'&ma_tra_loi='.$ma_binh_luan}}" method="POST">
                                    <img src="{{PUBLIC_URL . 'images/0.jpg'}}" alt="" width="50px" height="50px">
                                    <input name="noi_dung">
                                    <div>
                                        <button type="submit">Gửi</button>
                                    </div> 
                                </form>
                            </div>
                            <?php
                                $id_rep_comments=$comment['ma_binh_luan'];           
                                $sql2 = "select * from binh_luan JOIN tai_khoan ON binh_luan.ma_tai_khoan=tai_khoan.ma_tai_khoan WHERE ma_tra_loi= $id_rep_comments AND binh_luan.ma_ca=$ma_ca";
                                $stmt = $conn->prepare($sql2);
                                $stmt->execute();
                                $rep_comments = $stmt -> fetchAll();
                            ?>
                            @foreach ($rep_comments as $rep_comment)
                                <?php
                                     $anh=$rep_comment['anh_dai_dien'];
                                ?>
                                <div class="rep_comment">
                                    <div class="user_comment">
                                        <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="text_comment">
                                        <div>                           
                                            <span><?= $rep_comment['ho_ten']; ?></span>
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
        <div class="danh_gia">
            <h2>Đánh giá của khách hàng</h2>
            <div class="show_comment">
                <?php if ($list_danh_gia){ ?>
                    @foreach ($list_danh_gia as $danh_gia)
                        <?php
                             $anh=$danh_gia['anh_dai_dien'];
                        ?>
                        <div class="cmt">
                            <div class="user_comment">
                                <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" width="50px" height="50px" alt="">
                            </div>
                            <div class="text_comment">
                                <div>                           
                                    <span><?= $danh_gia['ho_ten']; ?></span>
                                    <span><?= $danh_gia['ngay_danh_gia'];?></span> 
                                    <span><p><?= $danh_gia['noi_dung']; ?></p></span>                                 
                                </div>                                            
                            </div>
                            
                        </div>
                        
                    @endforeach
                <?php } else {
                    echo "Sản phẩm chưa có đánh giá nào";
                } ?>
            </div>               
        </div>

        <div class="bai_viet">
            <h2>Bài viết liên quan</h2>
            @foreach ($list_bai_viet as $bai_viet)
                <div>
                    <div class="img">
                        <a href="{{BASE_URL.'kien-thuc/chi-tiet-bai-viet?id='}}{{$bai_viet['ma_bai_viet']}}"><img src="{{PUBLIC_URL . 'images/0.jpg'}}" alt=""></a>
                    </div>
                    <div class="tieu_de">
                        <a href="{{BASE_URL.'kien-thuc/chi-tiet-bai-viet?id='}}{{$bai_viet['ma_bai_viet']}}"><?php echo $bai_viet['tieu_de'] ?></a>
                    </div>
                </div>
            @endforeach
        </div>       
    </div>
</div>
@endsection