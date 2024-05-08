
   <div class="app">
        <header class="header">
            <div class="grid ">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <!-- <li class="header__navbar-item--has-qr header__navbar-item header__navbar-item-separate">
                            Vào cửa hàng trên ứng dụng Luong viết
                            <div class="header__qr">
                                <img src="../assets/img/QR.png" alt="QR CODE" class="header__qr-img">
                                <div class="header__qr-apps">
                                    <a class="header__qr-link" href="">
                                        <img src="../assets/img/Google_play.png" alt="" class="header__qr-dowload-img">
                                    </a>
                                    <a class="header__qr-link" href="">
                                        <img src="../assets/img/app_store.png" alt="" class="header__qr-dowload-img">
                                    </a>
                                </div>
                            </div>
                        </li> -->
                        <li class="header__navbar-item">
                            <span class="header__item-title--no-pointer">Kết nối</span>
                            <a href="" class="header__navbar-icon-link">
                                <i title="Facebook" class="header__navbar-icon fa-brands fa-facebook"></i>
                            </a>
                            
                            <a href="" class="header__navbar-icon-link">
                                <i title="Instagram" class="header__navbar-icon fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
    
                    <ul class="header__navbar-list">
                        <!-- <li class="header__navbar-item  header__navbar--item-has-notify">
                            <a href="" class="header__navbar-item-link ">
                                <i class="header__navbar-icon fa-solid fa-bell"></i>
                                Thông báo
                            </a>
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                    <ul class="header__notify-list">
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <span><img src="../assets/img/avtgithub.png" alt="" class="header__notify-img"></span>
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Mỹ phẩm ohui chính hãng</span>
                                                    <span class="header__notify-descriotion">Mô tả sản phẩm</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="" class="header__notify--footer-btn">Xem tất cả</a>
                                    </footer>
                               
                            </div>
                        </li> -->
                        @if (Auth::user() && Auth::user()->roles == "ADMIN_ROLE")
                        <li class="header__navbar-item" >
                            <!-- Link của admin -->
                            <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-solid fa-user-gear"></i>
                                Quản trị</a>
                        </li>
                        @endif
                        
                        
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-solid fa-circle-question"></i>
                                Trợ giúp</a>
                        </li>
                         
                        @if (Auth::user())
                        <li class="header__navbar-item header__navbar-user" >
                            <img src="{{ Auth::user()->image ? asset('upload/user/'.Auth::user()->image) : asset('upload/user/default.jpg') }}" alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name">{{ Auth::user()->name }}</span>
                            <div class="header__navbar-user-menu">
                                <ul class="header__navbar-user-list-item">
                                    <li class="header__navbar-user-item">
                                        <a href="{{ route('user.profile',Auth::user()->account_name) }}">Cập nhật thông tin</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="">Cài đặt mật khẩu</a>
                                    </li>
                                    <li class="header__navbar-user-item">
                                        <a href="home.php?act=donhang">Đơn mua</a>
                                    </li>
                                    <li class="header__navbar-user-item header__navbar-user-item-separative">
                                        <a href="home.php?act=logout">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @else
                        <li class="header__navbar-item " >
                            <a href="home.php?act=register" class="header__navbar-item-link header__navbar-item--strong header__navbar-item-separate">Đăng ký</a>
                        </li>
                        <li class="header__navbar-item" >
                            <a href="{{ route('app.login') }}" class="header__navbar-item-link header__navbar-item--strong">Đăng nhập</a>
                        </li>  
                        @endif   
                    </ul>
                </nav>
                <!-- Header with search -->
               <form action="" method="GET">
               <div class="header-with-search">
                    <div class="header__logo">
                        <a href="{{ route('app.home') }}" class="header__logo-link">
                            <img class="header__logo-img" src="{{ asset('image_app/Logo_poly.png') }}" alt="">
                        </a>
                    </div>
                    <div class="header__search">
                        <div class="header__search-input-wrap">
                            <input type="text" name="search" placeholder="Nhập để tìm kiếm sản phẩm" class="header__search-input">
                            <!-- search history -->
                            <!-- <div class="header__search-history">
                                <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                <ul class="header__search-history-list">
                                    <li class="header__search-history-list-item">
                                        <a href="">Tìm kiếm 1</a>
                                    </li>
                                    <li class="header__search-history-list-item">
                                        <a href="">Tìm kiếm 2</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="header__search-select">
                            <span class="header__search-select-label">Trong shop</span>
                            <i class="header__search-select-icon fa-solid fa-caret-down"></i>
                            <ul class="header__search-option">
                                <li class="header__search-option-item header__search-option-item-active">
                                    <span>Trong shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li>
                                <!-- <li class="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i class="fa-solid fa-check"></i>
                                </li> -->
                                
                            </ul>
                        </div>
                        <button type="submit" class="header__search-btn">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    </form>
                    <!-- cart layout -->
                    @include('custom.components.cart')
                </div>
               
            </div>
        </header>
