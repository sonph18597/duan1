<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{BASE_URL}}/admin" class="nav-link">Home</a>
      </li> 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- Right navbar --}}

        @if (!isset($_SESSION['user']))
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= BASE_URL . 'dang-nhap'?>">Đăng nhập</a>
         </li>
        @else
         
      
            <li >
              <a  href="{{ BASE_URL. 'dang-xuat'}}"  role="button"  >
                  Đăng xuất
              </a>
            </li>
        @endif
    </ul>
</nav>