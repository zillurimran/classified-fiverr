<!--Footer Section-->
<section>
    <footer class="bg-dark text-white">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <h6>Category</h6>

                        <ul class="list-unstyled mb-0">

                            @foreach($footer_category as $cats)
                                <li><a href="{{ route('category.ads', $cats->id) }}">{{ucfirst($cats->name)}}</a></li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="col-lg-2 col-md-12">
                        <h6>Pinlist</h6>
                        <ul class="list-unstyled mb-0">
                            <li><a href="{{route("home.page")}}">Home</a></li>
                            <li><a href="{{route("about.page")}}">About Us</a></li>
                            <li><a href="{{route("contact.page")}}">Contact Us</a></li>
                            <li><a href="{{route("blog")}}">Blogs</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-12">
                        <h6>Featured Ads</h6>
                        <ul class="list-unstyled mb-0">
                            @foreach($footer_featured as $ads)
                            <li><a href="{{route('ad.details', $ads->id)}}">{{substr(ucfirst($ads->ad_title),0,20)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <h6>Latest Ads</h6>
                        <ul class="list-unstyled mb-0">
                            @foreach($footer_latest as $ads)
                            <li><a href="{{route('ad.details', $ads->id)}}">{{substr(ucfirst($ads->ad_title),0,20)}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <h6 class="mb-2">Subscribe</h6>
                        <form>
                            <div class="input-group">
                                <input type="email" name="email" id='subscribeMail2' class="form-control br-ts-7 br-bs-7" placeholder="Email" required>
                                <div class="input-group-text border-0 bg-transparent p-0 ">
                                    <a id="subscribeBtn2" class="btn btn-primary br-te-7 br-be-7">
                                        Subscribe
                                    </a>
                                </div>
                            </div>
                            <span id="subscribeSuccess"></span>
                        </form>
                        <h6 class="mb-2 mt-5">Payments</h6>
                        <ul class="payments mb-0">
                            <li>
                                <a href="javascript:;" class="payments-icon"><i class="fa fa-cc-amex"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;" class="payments-icon"><i class="fa fa-cc-visa"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;" class="payments-icon"><i class="fa fa-credit-card-alt"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;" class="payments-icon"><i class="fa fa-cc-mastercard"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="javascript:;" class="payments-icon"><i class="fa fa-cc-paypal"
                                        aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white p-0">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-lg-8 col-sm-12  mt-2 mb-2 text-start ">
                        Copyright © {{ date('Y') }} <a href="{{route('home.page')}}" class="fs-14 text-primary">Pinlist</a>. All rights reserved.
                    </div>
                    <div class="col-lg-4 col-sm-12 ms-auto mb-2 mt-2">
                        <ul class="social mb-0">
                            <li>
                                <a class="social-icon" href="{{ generalSettings()->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href="{{ generalSettings()->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            {{-- <li>
                                <a class="social-icon" href=""><i class="fa fa-rss"></i></a>
                            </li> --}}
                            {{-- <li>
                                <a class="social-icon" href=""><i class="fa fa-youtube"></i></a>
                            </li> --}}
                            <li>
                                <a class="social-icon" href="{{ generalSettings()->linkedin }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            {{-- <li>
                                <a class="social-icon" href=""><i class="fa fa-google-plus"></i></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white p-0 border-top">
            <div class="container">
                <div class="p-2 text-center footer-links">

                    <a href="{{route('about.page')}}" class="btn btn-link">About Us</a>
                    <a href="{{route('all.categories')}}" class="btn btn-link">Ads Categories</a>
                    {{-- <a href="{{route('about.page')}}" class="btn btn-link">Privacy Policy</a>
                    <a href="{{route('about.page')}}" class="btn btn-link">Terms Of Conditions</a> --}}
                    <a href="{{route('blog')}}" class="btn btn-link">Blog</a>
                    <a href="{{route('contact.page')}}" class="btn btn-link">Contact Us</a>

                </div>
            </div>
        </div>
    </footer>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

    $(document).ready(function () {
        $('#subscribeBtn2').on('click', function(e){
            e.preventDefault();
            let email = $('#subscribeMail2').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('subscribeMail') }}",
                type: "post",
                data: {
                    email: email
                },
                success: function (response){
                    $('#subscribeMail2').val('');
                    $('#subscribeSuccess').html('<h3>Subscribe !</h3>');
                },
                error: function(err){
                    $('#subscribeMail2').val('');
                    $('#subscribeSuccess').html('<h3>Already Subscribed !</h3>');
                }
            });
        });
    });

</script>
<!--Footer Section-->
