@extends('layouts.client')
@section('client_content')
<style>
  h2{
    margin:50px auto; 
    text-align: center;
  }
  .fish_list{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
  }
  .fish{
    padding: 10px;
  }
  .fish img {
    width:300px;
  }
  .fish_image{
    height: 300px;
    align-items: center;
    display: flex;
    padding-bottom: 10px;
  }
  .fish .ten{
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .paging{
    display: flex;
    margin: 20px 0;
    justify-content: center;
  }
  .page{
    display: block;
    border: 1px solid black;
    border-radius: 5px;
    padding: 2px 5px;
    width: 30px;
    margin: 0 5px;
    text-align: center;
  }
  .mess{
    min-height: 340px;
  }
</style>
<?php
  $host='localhost';
    $dbname='du_an_1';
    $username='root';
    $password='';
    try {
        $conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8",$username,$password);
      } catch (PDOException $e){
        echo 'loi ket noi' .$e->getMessage();
      } 

  $fishNumber=9;
  if (isset($_GET['category'])){
    $category=$_GET['category'];
    $search = "WHERE ten_ca LIKE '%$category%'";
  } else {
    $search = "";
  }
  $sql= "select count(*) from ca ".$search;
  $stmt = $conn -> prepare($sql);
          $stmt -> execute();
          $paging = $stmt -> fetch();
          $pagenumber=ceil((int)$paging[0]/$fishNumber);
  if(isset($_GET['page'])){
    $skip=($_GET['page']-1)*$fishNumber;
  } else {
    $skip=0;
  }
  if(isset($_GET['category'])){
     $query = "select * from ca ".$search."
              ORDER BY   ma_ca
              LIMIT      $fishNumber
              OFFSET     $skip";

   } else {
    $query = "select * from ca
              ORDER BY   ma_ca
              LIMIT      $fishNumber
              OFFSET     $skip      
         ";
    }
          $stmt = $conn -> prepare($query);
          $stmt -> execute();
          $fishs = $stmt -> fetchAll();
?>

  <div class="container">
      <div class="table-ca" >
          <h2>Sản phẩm</h2>
          <div class="fish_list">
              <?php
              if(sizeof($fishs)!=0){
                foreach ($fishs as $fish) {
                ?>
                    <a href="{{BASE_URL.'chi-tiet?ma_ca='. $fish['ma_ca']}} ">
                      <div class="fish">                         
                              <div class="fish_image">                              
                                    <img src="{{PUBLIC_URL . '/images/'}}<?= $fish['anh'] ?>" width="150px" />
                              </div>
                              <div class="ten">
                                  <?= $fish['ten_ca'] ?>
                                  <div class="ten" style="color: red;">
                                      <?= number_format($fish['gia_ban'], 0, '', ",")." đ" ?><u></u>
                                  </div>
                              </div>                          
                      </div>
                    </a>
              <?php }
                } else { ?>
                  <div class="mess"><h2>Không tìm thấy sản phẩm</h2></div>
              <?php } ?>
          </div>
          <div class="paging" >
            <?php if(isset($_GET['category'])){
              $search_href="&category=".$_GET['category'];
            } else {
              $search_href="";
            } ?>
            <a class="page" href={{BASE_URL.'thu-vien'.$search_href}}>1</a>
              <?php             
              for ($i=2; $i <=$pagenumber ; $i++) { ?>             
                <a class="page" href="{{BASE_URL.'thu-vien'}}?page=<?php echo $i."".$search_href ?>"><?php echo $i; ?></a>
              <?php
              }              
              ?>
          </div>
      </div>
  </div>
  @endsection