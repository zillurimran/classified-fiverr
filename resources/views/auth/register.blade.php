@extends('frontend.layout.main')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner2.jpg') }}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1>Register</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Register-section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row ">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card mb-xl-0">
                                <div class="card-header">
                                    <h3 class="card-title">Register</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register_name" class="form-label text-dark">Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="register_name" class="form-control" placeholder="Enter name" required>
                                            @error('name')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="register_email" class="form-label text-dark">Email address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="register_email" class="form-control" placeholder="Enter email" required>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="register_password" class="form-label text-dark">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="register_password" class="form-control" placeholder="Password" required>
                                            @error('password')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="register_confirm_password" class="form-label text-dark">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" id="register_confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            @error('password_confirmation')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary btn-block">Create New Account</button>
                                        </div>
                                    </form>
                                    <div class="text-center  mt-3 text-dark">
                                        Already have account? <a href="{{ route('login') }}">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Register-section-->

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
