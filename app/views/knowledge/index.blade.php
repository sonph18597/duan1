@extends('layouts.client')
@section('client_content')

<style>
  .post_list{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }
  .post{
    padding: 10px;
  }
  .post img {
    width:300px;
  }
  .post_image{
    height: 300px;
    align-items: center;
    display: flex;
    padding-bottom: 10px;
  }
  .post .ten{
    display: flex;
    flex-direction: column;
    align-items: center;
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
    if(isset($_GET['category'])){
      $category=$_GET['category'];
      $query = "select * from bai_viet WHERE tieu_de LIKE '%$category%'";
  
    } else {
      $query = "select * from bai_viet
                ORDER BY   ma_bai_viet
                LIMIT      $postsNumber
                OFFSET     $skip     
                
      ";
    }
            $stmt = $conn -> prepare($query);
            $stmt -> execute();
            $posts = $stmt -> fetchAll();
?>
  <div class="container">
      <div class="table-posts" border=1 >
          <div class="h2">
              <h3>Bài Viết</h3>
          </div>
          <div class="fish_list">
              <?php
              foreach ($posts as $post) {
              ?>
                    <div class="post">                         
                            <div class="fish_image">
                                <img src="{{PUBLIC_URL . '/images/'}}<?= $post['anh'] ?>" width="150px" />
                            </div>
                            <div class="ten">
                                <?= $post['tieu_de'] ?>
                                <div class="ten" style="color: red;">
                                <?=$post['ngay_dang']?>
                                </div>
                            </div>                          
                    </div>
                  </a>
              <?php } ?>
          </div>
          <div class="paging" >
            <?php if(isset($_GET['category'])){
              $search_href="&category=".$_GET['category'];
            } else {
              $search_href="";
            } ?>
            <a href={{BASE_URL.'kien-thuc'.$search_href}}>1</a>
              <?php             
              for ($i=2; $i <=$pagenumber ; $i++) { ?>             
                <a class="page" href="{{BASE_URL.'kien-thuc'}}?page=<?php echo $i."".$search_href ?>"><?php echo $i; ?></a>
              <?php
              }              
              ?>
          </div>
      </div>
  </div>

  @endsection