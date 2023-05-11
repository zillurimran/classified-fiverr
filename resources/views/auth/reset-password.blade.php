@extends('frontend.layout.main')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('frontend/assets/images/banners/banner2.jpg') }}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1>Reset Password</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Reset Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Reset-Section-->
    <section class="sptb">
        <div class="container customerpage">
            <div class="row">
                <div class="col-lg-4 d-block mx-auto">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-md-12">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h3 class="card-title">Reset password</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('password.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="form-group">
                                            <label for="reset_email" class="form-label text-dark">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="reset_email" class="form-control" placeholder="Enter email" required>
                                            @error('email')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="reset_password" class="form-label text-dark">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" id="reset_password" class="form-control" placeholder="Enter password" required>
                                            @error('password')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="reset_password_confirmation" class="form-label text-dark">Confirm Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" id="reset_password_confirmation" class="form-control" placeholder="Confirm password" required>
                                            @error('password_confirmation')
                                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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
    <!--/Reset-Section-->

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
