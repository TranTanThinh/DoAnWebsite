<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="{{ asset ('Dashboard/assets/img/kaiadmin/logo_light.svg')}}"
            alt="navbar brand"
            class="navbar-brand"
            height="20"
          />
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          
          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" id="toggle-products">
                <i class="fas fa-file"></i>
                <p>Quản lý sản phẩm</p>
            </a>
            <!-- Thư mục con (sub-menu) ẩn khi chưa nhấn -->
            <ul class="nav nav-treeview" id="products-submenu" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('products.search') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categories.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Loại sản phẩm</p>
                  </a>
              </li>
            </ul>
        </li>
              
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/contacts') }}">
              <i class="fas fa-file"></i>
               <p href="contacts">Quản lý liên hệ</p> 
              
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/reviews') }}">
              <i class="fas fa-file"></i>
               <p href="products">Quản lý bình luận</p> 
              
            </a>
          </li>

          <script>
            document.getElementById('toggle-products').addEventListener('click', function() {
                var submenu = document.getElementById('products-submenu');
                if (submenu.style.display === 'none' || submenu.style.display === '') {
                    submenu.style.display = 'block'; // Hiển thị sub-menu
                } else {
                    submenu.style.display = 'none'; // Ẩn sub-menu
                }
            });
        </script>

        </ul>
      </div>
    </div>
    
  </div>
  <!-- End Sidebar -->
  
