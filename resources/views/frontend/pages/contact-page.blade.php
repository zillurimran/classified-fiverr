@extends('frontend.layout.main')

@section('contact-page-menu', 'active')

@section('main')
    <!--Breadcrumb-->
    <div>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Contact Us</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->

    <!--Contact-->
    <div class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-4  col-md-12 mx-auto d-block">
                    <form action="{{ route('guest.message') }}" method="POST">
                        @csrf
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Address *" required>
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message *" required></textarea>
                                    @error('message')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Contact-->

    <!--Statistics-->
    <section class="sptb bg-white">
        <div class="container">
            <div class="section-title center-block text-center">
                <h1>{{ $contact->title }}</h1>
                <p>{{ $contact->sub_title }}</p>
            </div>
            <div class="support">
                <div class="row text-white">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="support-service bg-primary br-2 mb-4 mb-xl-0">
                            <i class="fa fa-phone"></i>
                            <h6>
                                <a href="tel:+{{ $contact->phone }}" class="text-white">{{ $contact->phone }}</a>
                            </h6>
                            <P>Free Support!</P>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <div class="support-service bg-secondary br-2 mb-4 mb-xl-0">
                            <i class="fa fa-clock-o"></i>
                            <h6>{{ $contact->working_hour }}</h6>
                            <p>Working Hours!</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12  col-md-12">
                        <div class="support-service bg-warning br-2">
                            <i class="fa fa-envelope-o"></i>
                            <h6>
                                <a href="mailto:yourdomain@gmail.com" class="text-white">{{ $contact->email }}</a>
                            </h6>
                            <p>Support us!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Statistics-->
@endsection
