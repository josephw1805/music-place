<header class="header_3">
    <div class="row">
        <div class="col-xxl-4 col-lg-7 col-md-8 d-none d-md-block">
            <ul class="wsus__header_left d-flex flex-wrap">
                <li><a href="https://www.facebook.com/0905CyndiWang/" target="_blank"><i class="fab fa-facebook-f"></i> 2M
                        Followers</a></li>
                <li><a href="https://www.tiktok.com/@cyndiwang905" target="_blank"><i class="fab fa-tiktok"></i> 282.9K
                        Followers</a></li>
                <li><a href="https://www.instagram.com/cyndiloves2sing/" target="_blank"><i
                            class="fab fa-instagram"></i> 840k Followers</a></li>
            </ul>
        </div>
    </div>
</header>

<!--===========================
        MAIN MENU 3 START
    ============================-->
<nav class="navbar navbar-expand-lg main_menu main_menu_3">
    <a class="navbar-brand" href="index_3.html">
        <img src="{{ asset('frontend/assets/images/logo.png') }}"" alt="EduCore" class="img-fluid">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="menu_category">
            <div class="icon">
                <img src="{{ asset('frontend/assets/images/grid_icon.png') }}" alt="Category" class="img-fluid">
            </div>
            Category
            <ul>
                <li>
                    <a href="#">
                        <span>
                            <img src="{{ asset('frontend/assets/images/menu_category_icon_1.png') }}" alt="Category"
                                class="img-fluid">
                        </span>
                        Development
                    </a>
                    <ul class="category_sub_menu">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">UI/UX Design</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav m-auto">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Courses <i class="far fa-angle-down"></i></a>
                <ul class="droap_menu">
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="courses_details.html">Course details</a></li>
                    <li><a href="course_video.html">Course video</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">blog <i class="far fa-angle-down"></i></a>
                <ul class="droap_menu">
                    <li><a href="blogs.html">blog grid view</a></li>
                    <li><a href="blog_list.html">blog list view</a></li>
                    <li><a href="blog_details.html">blog details</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">contact us</a>
            </li>
        </ul>

        <div class="right_menu">
            <ul>
                <li>
                    <a class="menu_signin" href="#">
                        <span>
                            <img src="{{ asset('frontend/assets/images/cart_icon_black.png') }}" alt="user"
                                class="img-fluid">
                        </span>
                        <b>06</b>
                    </a>
                </li>
                <li>
                    <a class="admin" href="{{ route('admin.login') }}">
                        <span>
                            <img src="{{ asset('frontend/assets/images/user_icon_black.png') }}" alt="user"
                                class="img-fluid">
                        </span>
                        admin
                    </a>
                </li>
                <li>
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a class="common_btn" href="{{ route('student.dashboard') }}">Dashboard</a>
                        @else
                            <a class="common_btn" href="{{ route('artist.dashboard') }}">Dashboard</a>
                        @endif
                    @else
                        <a class="common_btn" href="{{ route('login') }}">Sign in</a>
                    @endauth
                </li>
            </ul>
        </div>

    </div>
</nav>
<!--===========================
        MAIN MENU 3 END
    ============================-->


<!--============================
        STICKY MENU START
    ==============================-->
<div class="mobile_menu_area">
    <div class="mobile_menu_area_top">
        <a class="mobile_menu_logo" href="index.html">
            <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="EduCore">
        </a>
        <div class="mobile_menu_icon d-block d-lg-none" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <span class="mobile_menu_icon"><i class="far fa-stream menu_icon_bar"></i></span>
        </div>
    </div>

    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                class="fal fa-times"></i></button>
        <div class="offcanvas-body">

            <ul class="mobile_menu_header d-flex flex-wrap">
                <li><a href="cart_view.html"><i class="far fa-shopping-basket"></i> <span>2</span></a>
                </li>
                <li>
                    @auth
                        @if (auth()->user()->role === 'student')
                            <a href="{{ route('student.dashboard') }}"><i class="far fa-user"></i></a>
                        @else
                            <a href="{{ route('artist.dashboard') }}"><i class="far fa-user"></i></a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"><i class="far fa-user"></i></a>
                    @endauth
                </li>
            </ul>

            <form class="mobile_menu_search">
                <input type="text" placeholder="Search">
                <button type="submit"><i class="far fa-search"></i></button>
            </form>

            <div class="mobile_menu_item_area">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                            aria-selected="true">menu</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                            aria-selected="false">Categories</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                        aria-labelledby="nav-home-tab" tabindex="0">
                        <ul class="main_mobile_menu">
                            <li class="mobile_dropdown">
                                <a href="javascript:;">home</a>
                                <ul class="inner_menu">
                                    <li><a class="active" href="index.html">About</a></li>
                                    <li><a class="active" href="index.html">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="mobile_dropdown">
                                <a href="#">courses</a>
                                <ul class="inner_menu">
                                    <li><a href="courses.html">Courses</a></li>
                                </ul>
                            </li>
                            <li class="mobile_dropdown">
                                <a href="#">blog</a>
                                <ul class="inner_menu">
                                    <li><a href="blogs.html">blog grid view</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">
                        <ul class="main_mobile_menu">
                            <li class="mobile_dropdown">
                                <a href="#">
                                    <span>
                                        <img src="{{ asset('frontend/assets/images/menu_category_icon_1.png') }}"
                                            alt="Category" class="img-fluid">
                                    </span>
                                    Development
                                </a>
                                <ul class="inner_menu">
                                    <li><a href="courses_details.html">Web Design</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--============================
        STICKY MENU END
    ==============================-->
