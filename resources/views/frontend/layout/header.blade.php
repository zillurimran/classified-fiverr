<!--Topbar-->
<div class="header-main">
    <div class="top-bar">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <div class="top-bar-left d-flex">
                        <div class="clearfix">
                            <ul class="socials">
                                <li>
                                    <a class="social-icon text-dark" href="{{ generalSettings()->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon text-dark" href="{{ generalSettings()->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon text-dark" href="{{ generalSettings()->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a class="social-icon text-dark" href="{{ generalSettings()->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix">
                            <ul class="contact border-start">
                                <li class="me-5 d-lg-none">
                                    <a href="#" class="callnumber text-dark"><span><i class="fa fa-phone me-1"></i>: {{ generalSettings()->phone }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="top-bar-right">
                        <ul class="custom">
                            @guest
                            <li>
                                <a href="{{ route('register') }}" class="text-dark"><i class="fa fa-user me-1"></i>
                                    <span>Register</span></a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}" class="text-dark"><i class="fa fa-sign-in me-1"></i>
                                    <span>Login</span></a>
                            </li>
                            @endguest
                            @auth
                            <li class="dropdown">
                                <a href="#" class="text-dark" data-bs-toggle="dropdown">
                                    <i class="fa fa-home me-1"></i>
                                    <span> My Dashboard</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <a href="{{ route('dashboard') }}" class="dropdown-item">
                                        <i class="dropdown-icon si si-user"></i> My Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon si si-bell"></i> Notifications
                                    </a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item" type="submit"><i class="mr-50" data-feather="power"></i> <i class="dropdown-icon si si-power"></i> Log out</button>
                                    </form>
                                </div>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Header -->
    <div class="sticky">
        <div class="horizontal-header clearfix ">
            <div class="container">
                <a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                <span class="smllogo">
                    <img class="mobile-light-logo" src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo}}" width="120" alt="logo" />
                    <img class="mobile-dark-logo" src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo_dark}}" width="120" alt="logo" />
                </span>
                <a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <!-- Mobile Header -->


    <div class="horizontal-main clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <div class="desktoplogo">
                <a href="{{ route('home.page') }}" class="light-logo"><img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo}}" alt=""></a>
                <a href="{{ route('home.page') }}" class="dark-logo"><img src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->logo_dark}}" alt=""></a>
            </div>

            <!--Nav-->
            <nav class="horizontalMenu clearfix d-md-flex">
                <ul class="horizontalMenu-list">
                    <li>
                        <a href="{{ route('home.page') }}" class="@yield('home-page-menu')">Home</a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('about.page') }}" class="@yield('about-page-menu')">About Us</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('blog') }}" class="@yield('blogs-page-menu')">Blogs</a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('ads') }}" class="@yield('ads-page-menu')">Ads</a>
                    </li>
                    <li aria-haspopup="true">
                        <a href="javascript:void(0)" class="@yield('categories-page-menu')">Categories <span class="fa fa-caret-down m-0"></span></a>
                        <div class="horizontal-megamenu clearfix">
                            <div class="container">
                                <div class="megamenu-content">

                                    <div class="row">
                                        @forelse (getCategories()->chunk(8) as $category)
                                        <ul class="col link-list">
                                            @foreach($category as $category_item)
                                            <li aria-haspopup="true">
                                                <a href="{{ route('category.ads', $category_item->id) }}">{{$category_item->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @empty
                                            <h3>No Categories</h3>
                                        @endforelse
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('contact.page') }}" class="@yield('contact-page-menu')"> Contact Us <span class="wsarrow"></span></a>
                    </li>
                    <li aria-haspopup="true" class="d-lg-none mt-5 pb-5 mt-lg-0">
                        <span><a class="btn btn-secondary" href="{{ route('ad.posts.page') }}">Post Ad</a></span>
                    </li> --}}
                </ul>
                {{-- <ul class="mb-0">
                    <li aria-haspopup="true" class="mt-5 d-none d-lg-block ">
                        <span><a class="btn btn-secondary" href="{{ route('ad.posts.page') }}">Post Ad</a></span>
                    </li>
                </ul> --}}
            </nav>
            <!--Nav-->
        </div>
    </div>

</div>
