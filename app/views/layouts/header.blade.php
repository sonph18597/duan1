<!DOCTYPE php>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>CA.KOI</title>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="http://localhost/duan1/public/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="http://localhost/duan1/public/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="http://localhost/duan1/public/css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="http://localhost/duan1/public/css/login.css">
</head>
<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container navbar-dark ">
          <a class="navbar-brand" href="{{BASE_URL.'trang-chu'}}">
            <span>
              CaKoi
            </span>
          </a>
          <button onclick="nav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{BASE_URL.'trang-chu'}}">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{BASE_URL.'gioi-thieu'}}">Giới Thiệu</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{BASE_URL.'kien-thuc'}}">Kiến thức</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{BASE_URL.'thu-vien'}}">Thư Viện</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{BASE_URL.'lien-he'}}">Liên hệ</a>
                </li>
                
              </ul>
            </div>
            <div class="quote_btn-container ">
              <?php if (isset($_SESSION ["user"])) : ?>
                <a href="{{BASE_URL.'chi-tiet-tai-khoan'}}" style="color: white"> <b><?php echo ($_SESSION ["user"]["ten_tai_khoan"]);?></b> </a>
                <?php
                      $anh = $_SESSION ["user"]["anh_dai_dien"];
                     
                ?>
                <img src="{{PUBLIC_URL}}dist/img/{{$anh}}" alt="" style=" width: 40px;border-radius: 100px;">
              <?php else :?>
                <a href="{{BASE_URL.'dang-nhap'}}"> Log in </a>
              <?php endif ;?>


              <a href="{{BASE_URL.'gio-hang'}}">
                <img src="{{PUBLIC_URL.'images/cart.png'}}" alt="">
              </a>
              <form class="form-inline" action="{{BASE_URL.'thu-vien'}}">
                <input type="text" name="category">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
  </div>
<script>
    function nav(){
      let item = document.getElementById("navbarSupportedContent").classList;
      console.log(item.length);
      if (item.length==3){
        item=item.remove("show");
      } else {
        item=item.add("show");
      }
    } 
</script>

