<nav class="navbar navbar-default menu-mobile" role="navigation" style=" margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
    background-color: #f18121;">
    <div class=" container ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="true">
            <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button> 
            <h1 class="" style="margin:0;">
                <a style="font-weight: bolder;
    font-size: x-large;color: white;" class="navbar-brand" href="{{route('wibcomi.home')}}">
                Wibcomi
                </a>
            </h1>
        </div>
        <div class="navbar-custom-menu" style="    position: absolute;
    top: 0;
    right: 74px;width: 50%;">
            <ul class="nav navbar-nav  navbar-right ">
                <li class="search dropdown open">
                    <div class="dropdown-menu">
                        <form class="top-search" style="width: 70%;" action="{{route('wibcomi.manga.category')}}" method="get">
                        <input id="autocomplete" name="keyword" class="text-search" type="text" placeholder="Tìn kiếm" autocomplete="off">
                        <button class="submit-btn btn_search"></button>
                        </form>
                    </div>
                </li>
                <!-- Notifications Menu -->
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-menu" aria-expanded="true" style="">
            <!-- menu -->
            <ul class="nav navbar-nav  navbar-right ">
                <li>
                    <a href="{{route('wibcomi.home')}}" title="Trang chủ">
                    Trang chủ
                    </a>
                </li>
                <li>
                    <a href="{{route('wibcomi.manga.category')}}" title="Thể loại">
                    Thể loại
                    </a>
                </li>
                <li>
                    <a href="{{route('wibcomi.manga.category')}}?status=2&id=1" title="Truyện full">
                    Truyện full
                    </a>
                </li>
                <li>
                    <a href="{{route('wibcomi.manga.category')}}?sort=10&id=1" title="Top all">
                    Top all
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section class="top-bar" id="home">
    <div class="container">
        <div class="level">
            <div class="level-left pc">
                <div>
                <a style="font-weight: bolder;
    font-size: x-large;color: #f18121;" href="{{route('wibcomi.home')}}">Wibcomi</a>
                </div>
                <!-- /.logo -->
                <div class="top-search">
                    <form class="top-search" action="{{route('wibcomi.manga.category')}}" method="get">
                        <input id="autocomplete" name="keyword" class="text-search" type="text" placeholder="Tìn kiếm" autocomplete="off">
                        <button class="submit-btn btn_search"></button>
                    </form>
                    <div class="list-results">
                        <!-- Add class 'open' to open list results -->
                        <div class="title-search">Tìm kiếm gần đây</div>
                        <div class="list-container">
                        </div>
                    </div>
                    <!-- /.list-results -->
                </div>
                <!-- /.top-search -->
            </div>
            <div class="level-right" style="display: none;">
                <div class="top-buttons has-login">
                    <button class="login-btn">Đăng nhập</button>
                    <button class="register-btn">Đăng ký</button>
                </div>
                <!-- /.top-buttons -->
            </div>
        </div>
    </div>
</section>
<!-- /.top-bar -->
<div class="modal login-modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <span class="top-caption">
        Dù ai di ngược về xuôi,<br>
        đến giờ đọc truyện cứ vào QQ
        </span>
        <div>
            <!-- /.top-caption -->
            <div class="tabs-buttons">
                <button data-type="login">Đăng nhập</button>
                <button data-type="register">Đăng ký</button>
            </div>
            <!-- /.tabs-button -->
            <div class="tabs-contents">
                <div class="login-section">
                    <div class="form-login">
                        <input type="email" placeholder="Email" id="email_login">
                        <input type="password" placeholder="Mật khẩu" id="password_login">
                        <button type="submit" class="button_login btn btn-lg">Đăng nhập</button>
                        <a href="javascript:void(0);" class="forget-password-link">Quên mật khẩu</a>
                    </div>
                    <div class="social-login">
                        <span>Hoặc đăng nhập bằng:</span>
                        <a href="http://truyenqq.com/dang-nhap-facebook.html?url=http://truyenqq.com/" class="facebook-link"><span class="facebook-icon"></span></a>
                        <a href="http://truyenqq.com/dang-nhap-google.html?url=http://truyenqq.com/" class="google-link"><span class="google-icon"></span></a>
                    </div>
                </div>
                <!-- /.login-section -->
                <div class="register-section">
                    <div class="form-login">
                        <input type="email" placeholder="Email" id="email_register">
                        <input type="password" placeholder="Mật khẩu" id="password_register">
                        <div class="login-captcha">
                            <input type="text" class="form-control" id="captcha_register" name="captcha_register" placeholder="Mã xác nhận">
                            <img src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/logo.png" alt="Mã Xác Nhận">
                            <span class="refresh-captcha" data-type="register"><i class="fas fa-sync-alt"></i></span>
                            <input type="hidden" name="captcha-register" id="captcha-register" value="">
                        </div>
                        <button type="submit" id="button_register">Đăng ký</button>
                    </div>
                </div>
            </div>
            <!-- /.register-section -->
        </div>
        <!-- /.tabs-contents -->
    </div>
</div>
<!-- /.login-modal -->
<div class="modal notify-modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <span class="top-caption">
        Quên mật khẩu hử !<br>
        Đã có QQ lo
        </span>
        <!-- /.top-caption -->
        <div class="forget-password-section">
            <span class="caption">Mật khẩu khôi phục sẽ được gởi qua email mà bạn đăng ký</span>
            <div class="form-forgot">
                <input type="email" placeholder="Email" id="email-forgot">
                <div class="login-captcha">
                    <input type="text" class="form-control" id="captcha_forgot" name="captcha_forgot" placeholder="Mã xác nhận">
                    <img src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/logo.png" alt="Mã Xác Nhận">
                    <span class="refresh-captcha" data-type="forgot"><i class="fas fa-sync-alt"></i></span>
                    <input type="hidden" name="captcha-register" id="captcha-forgot" value="">
                </div>
                <button type="submit" id="button-forgot">Gửi mật khẩu</button>
            </div>
        </div>
        <!-- /.forget-password-section -->
        <div class="sent-password-section">
            <span class="check-icon"></span>
            <span class="caption">Mật khẩu khôi phục đã được gởi bạn hãy kiểm tra trong hộp thư</span>
        </div>
        <!-- /.sent-password-section -->
        <a href="javascript:void(0);" class="back-to-login">Tôi muốn quay lại đăng nhập</a>
        <!-- /.back-to-login -->
    </div>
</div>
<!-- /.notify-modal -->
<section class="main-menu">
    <div class="container">
        <nav class="navbar">
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="top-search smp">
                        <input class="text-search" type="text" placeholder="Bạn cứ nhập từ khoá, còn lại để qq lo">
                        <button class="submit-btn btn_search"></button>
                        <div class="list-results">
                        </div>
                    </div>
                    <a href="{{route('wibcomi.home')}}" class="navbar-item">Trang Chủ</a>
                    <div class="navbar-item has-dropdown is-hoverable is-mega">
                        <div class="navbar-link">Thể loại</div>
                        <div class="navbar-dropdown ">
                            <div class="container">
                                <div class="level">
                                    <div class="level-left mega-list-wrapper">
                                        <div class="columns">
                                            @foreach($category as $key)
                                            <div class="column column-menu">
                                                <ul class="mega-list">
                                                    @foreach($key as $value)
                                                    <li><a href="{{route('wibcomi.manga.category')}}?type={{$value['slug']}}&id=1">{{$value['name']}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="level-right pc">
                                        <img src="./Đọc truyện tranh Manhwa, Manga, Manhua Online_files/menu-icon.jpg" class="mega-menu-cover" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navbar-item has-dropdown is-hoverable is-mega">
                        <div class="navbar-link">Sắp Xếp</div>
                        <div class="navbar-dropdown ">
                            <div class="container">
                                <div class="level">
                                    <div class="level-left mega-list-wrapper">
                                        <div class="columns">
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=0&id=1">Ngày cập nhật</a></li>
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=15&id=1">Truyện mới</a></li>
                                                </ul>
                                            </div>
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=10&id=1">Đầu bảng</a></li>
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=20&id=1">Số lượt theo dõi</a></li>
                                                </ul>
                                            </div>
                                            <div class="column">
                                                <ul class="mega-list">
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=30&id=1">Số chương truyện</a></li>
                                                    <li><a href="{{route('wibcomi.manga.category')}}?sort=5&id=1">Tên truyện A-Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('wibcomi.manga.category')}}?status=2&id=1" class="navbar-item">Truyện Full</a>
                    <a href="{{route('wibcomi.manga.category')}}?sort=10&id=1" class="navbar-item">Top all</a>
                    <a rel="nofollow" href="" class="navbar-item"></a>
                    <a rel="nofollow" href="" class="navbar-item">Theo Dõi</a>
                </div>
            </div>
        </nav>
    </div>
</section>
<!-- /.main-menu -->