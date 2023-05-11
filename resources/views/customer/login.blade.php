@extends('frontend.layout.main')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner2.jpg') }}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1>Login</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">User Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Login-Section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h3 class="card-title">Login to your Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('attemptLogin') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="login_email" class="form-label text-dark">Email address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="login_email" class="form-control" placeholder="Enter email" required>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="login_password" class="form-label text-dark">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="login_password" class="form-control" placeholder="Password" required>
                                            @error('password')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="custom-control form-checkbox">
                                                <a href="{{ route('password.email') }}" class="float-end small text-dark mt-1">I forgot password</a>
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label text-dark">Remember me</span>
                                            </label>
                                        </div>
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="text-center  mt-3 text-dark">
                                        Don't have account yet? <a href="{{ route('registerView') }}">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Login-Section-->

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
