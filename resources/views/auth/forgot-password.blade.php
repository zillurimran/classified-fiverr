@extends('frontend.layout.main')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner2.jpg') }}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1>Forgot Password</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Forgot Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Forgot-Section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h3 class="card-title">Forgot password</h3>
                                </div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">{{ session('status') }}</div>
                                    @endif
                                    <div class="text-dark mb-3">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. </div>
                                    <form action="{{ route('password.email') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="forgot_email" class="form-label text-dark">Email address <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="forgot_email" class="form-control" placeholder="Enter email" required>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary btn-block">Send</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Forgot-Section-->

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
