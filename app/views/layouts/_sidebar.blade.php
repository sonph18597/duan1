<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{BASE_URL.'trang-chu'}}" class="brand-link">
      <img src="{{PUBLIC_URL}}/images/085afd5d0208f552b20a7cf9dd822235228e1771279e15739dfcfc59986145c1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Cá koi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{PUBLIC_URL}}dist/img/{{$_SESSION['user']['anh_dai_dien']}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$_SESSION['user']['ten_tai_khoan']}}</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- Loại Cá --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Loại cá
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{BASE_URL . 'loai-ca'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{BASE_URL . 'loai-ca/tao-moi'}}" class="nav-link">
                   
                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- Cá --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Cá
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{BASE_URL . 'ca'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{BASE_URL . 'ca/tao-moi'}}" class="nav-link">
                   
                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>
           {{-- Người dùng --}}
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Người dùng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{BASE_URL . 'nguoi-dung'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{BASE_URL . 'nguoi-dung/tao-moi'}}" class="nav-link">
                   
                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Đơn hàng --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Đơn hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ BASE_URL . 'don-hang'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
      
            </ul>
          </li>

          {{-- Bình luận --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bình luận
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ BASE_URL . 'binh-luan'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- Thống kê --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Thống kê
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ BASE_URL . 'thong-ke'}}" class="nav-link">
                   
                  <p>Danh sách</p>
                </a>
              </li>
            </ul>
          </li>

            {{-- Chi nhánh --}}
            @if ($_SESSION['user']['vai_tro'] == 'Admin')                
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Chi nhánh
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ BASE_URL . 'chi-nhanh'}}" class="nav-link">
                      <i class=" nav-icon"></i>
                      <p>Danh sách</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ BASE_URL . 'chi-nhanh/tao-moi'}}" class="nav-link">
                      
                      <p>Tạo mới</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          {{-----------------}}

          {{-- Bài viết --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ BASE_URL . 'bai-viet'}}" class="nav-link">
                  <i class=" nav-icon"></i>
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ BASE_URL . 'bai-viet/tao-moi'}}" class="nav-link">
                   
                  <p>Tạo mới</p>
                </a>
              </li>
            </ul>
          </li>

        {{-----------------}}

        {{-- Đánh giá --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Đánh giá
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ BASE_URL . 'danh-gia'}}" class="nav-link">
                <i class=" nav-icon"></i>
                <p>Danh sách</p>
              </a>
            </li>
            
          </ul>
        </li>

      {{-----------------}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>