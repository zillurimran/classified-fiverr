@extends('frontend.layout.main')

@section('about-page-menu', 'active')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">About Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">About Us</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--section-->
    <section class="sptb">
        <div class="container">
            <div class="text-justify">
                <h1 class="mb-4">{{ $banner->title }}</h1>
                <h4 class="leading-normal">{{ $banner->sub_title }}</h4>
                <p class="leading-normal">
                    {{ $banner->description }}
                </p>
            </div>
        </div>
    </section>
    <!--/section-->

    <!--How to work-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>{{ $title->about_section1_title }}</h1>
                <p>{{ $title->about_section1_subTitle }}</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-secondary-transparent icon-bg icon-service text-pink">
                                    {!! $feature->feature1_icon !!}
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $feature->feature1_title }}</h4>
                                    <p class="text-muted mb-0">{{ $feature->feature1_subTitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-lg-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-purple-transparent icon-bg icon-service text-purple">
                                    {!! $feature->feature2_icon !!}
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $feature->feature2_title }}</h4>
                                    <p class="text-muted mb-0">{{ $feature->feature2_subTitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="mb-sm-0 mb-4">
                            <div class="service-card text-center">
                                <div class="bg-warning-transparent icon-bg icon-service text-warning">
                                    {!! $feature->feature3_icon !!}
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $feature->feature3_title }}</h4>
                                    <p class="text-muted mb-0">{{ $feature->feature3_subTitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="">
                        <div class="">
                            <div class="service-card text-center">
                                <div class="bg-secondary-transparent icon-bg icon-service text-pink">
                                    {!! $feature->feature4_icon !!}
                                </div>
                                <div class="servic-data mt-3">
                                    <h4 class="font-weight-semibold mb-2">{{ $feature->feature4_title }}</h4>
                                    <p class="text-muted mb-0">{{ $feature->feature4_subTitle }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/How to work-->

    <!--post section-->
    <section>
        <div class="cover-image sptb bg-background-color" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner4.jpg') }}">
            <div class="content-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="mb-2">{{ $title->about_section2_title }}</h1>
                        <p>{{ $title->about_section2_subTitle }}</p>
                        <div class="mt-5">
                            <a href="ad-posts.html" class="btn btn-secondary btn-pill">Free Post Ad</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/post section-->

    <!--section-->
    <section class="sptb">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>{{ $title->about_section3_title }}</h1>
                <p>{{ $title->about_section3_subTitle }}</p>
            </div>
            <div class="row ">
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-success mb-3">
                                    {!! $feature->feature5_icon !!}
                                </div>
                                <h3>{{ $feature->feature5_title }}</h3>
                                <p>{{ $feature->feature5_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-primary mb-3">
                                    {!! $feature->feature6_icon !!}
                                </div>
                                <h3>{{ $feature->feature6_title }}</h3>
                                <p>{{ $feature->feature6_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-secondary mb-3">
                                    {!! $feature->feature7_icon !!}
                                </div>
                                <h3>{{ $feature->feature7_title }}</h3>
                                <p>{{ $feature->feature7_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-lg-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-warning mb-3">
                                    {!! $feature->feature8_icon !!}
                                </div>
                                <h3>{{ $feature->feature8_title }}</h3>
                                <p>{{ $feature->feature8_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-lg-0 mb-md-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-danger mb-3">
                                    {!! $feature->feature9_icon !!}
                                </div>
                                <h3>{{ $feature->feature9_title }}</h3>
                                <p>{{ $feature->feature9_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 features">
                    <div class="card mb-0">
                        <div class="card-body text-center">
                            <div class="feature">
                                <div class="fa-stack fa-lg  fea-icon bg-info mb-3">
                                    {!! $feature->feature10_icon !!}
                                </div>
                                <h3>{{ $feature->feature10_title }}</h3>
                                <p>{{ $feature->feature10_subTitle }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/section-->

    <!--Statistics-->
    {{-- <section class="sptb bg-white">
        <div class="container">
            <div class="statistics-info text-dark">
                <div class="row text-center">

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-status mb-6 mb-lg-0">
                            <div class="counter-icon">
                                <i class="si si-people"></i>
                            </div>
                            <h5>Clients</h5>
                            <h2 class="counter mb-0">2569</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-status mb-6 mb-lg-0">
                            <div class="counter-icon">
                                <i class="si si-rocket"></i>
                            </div>
                            <h5>Total Sales</h5>
                            <h2 class="counter mb-0">1765</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-status mb-6 mb-sm-0">
                            <div class="counter-icon">
                                <i class="si si-docs"></i>
                            </div>
                            <h5>Total Projects</h5>
                            <h2 class="counter mb-0">846</h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-status">
                            <div class="counter-icon">
                                <i class="si si-emotsmile"></i>
                            </div>
                            <h5>Happy Customers</h5>
                            <h2 class="counter mb-0">7253</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--/Statistics-->

    @include('frontend/section/newsletter')

@endsection

@push('plugins-js')
	<!--Counters-->
	<script src="{{ asset('frontend/assets/plugins/counters/counterup.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/counters/waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/counters/numeric-counter.js') }}"></script>
@endpush
