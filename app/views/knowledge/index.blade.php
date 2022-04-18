@extends('layouts.client')
@section('client_content')

<style>
  h2{
    margin:50px auto; 
    text-align: center;
  }
  .post_list{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: space-around;
  }
  .inf_post{
    margin: 20px;
    width: 60%;
  }
  .thoi_gian{
    display: flex;
    justify-content: flex-end;
  }
  .post{
    display: flex;
    padding: 10px;
  }
  .post img {
    width:200px;
  }
  .post_image{
    align-items: center;
    display: flex;
    padding-bottom: 10px;
  }
  .paging{
    text-align: center;
    margin: 20px 0;
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
    $postsNumber=5 ;
    $sql= "select count(*) from bai_viet";
    $stmt = $conn -> prepare($sql);
            $stmt -> execute();
            $paging = $stmt -> fetch();
            $pagenumber=ceil((int)$paging[0]/$postsNumber);
    if(isset($_GET['page'])){
      $skip=($_GET['page']-1)*$postsNumber;
    } else {
      $skip=0;
    } 

    $query = "SELECT * FROM bai_viet
              ORDER BY   ma_bai_viet
              LIMIT      $postsNumber
              OFFSET     $skip     
                
    ";
    $stmt = $conn -> prepare($query);
    $stmt -> execute();
    $posts = $stmt -> fetchAll();
?>
<div class="container">
  <div class="table-posts">
    <h2>Bài viết</h2>
    <div class="post_list">
      <?php foreach ($posts as $post) {?>
        <?php $id=$post['ma_bai_viet']; ?>
        <div class="post">                         
          <div class="post_image">
            <a href="{{BASE_URL.'kien-thuc/chi-tiet-bai-viet?id='.$id}}"><img src="{{PUBLIC_URL . '/images/'}}<?= $post['anh'] ?>" width="150px" /></a>
          </div>
          <div class="inf_post">
            <div class="ten">
              <a href="{{BASE_URL.'kien-thuc/chi-tiet-bai-viet?id='.$id}}"><?= $post['tieu_de'] ?></a>
            </div>
            <div class="thoi_gian" style="color: red;">
              <?=$post['ngay_dang']?>
            </div>
          </div>
        </div>
        <hr>                                 
      <?php } ?>
    </div>
    <div class="paging" >
      <a href={{BASE_URL.'kien-thuc'}}>1</a>
      <?php for ($i=2; $i <=$pagenumber ; $i++) { ?>             
        <a class="page" href="{{BASE_URL.'kien-thuc'}}?page=<?php echo $i ?>"><?php echo $i ?></a>
      <?php } ?>
    </div>
  </div>
</div>

@endsection