<!doctype html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="msapplication-TileColor" content="#0f75ff">
	<meta name="theme-color" content="#2ddcd3">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="description" content="Pinlist – Directory, Classifieds and Jobs Multipurpose Bootstrap5 HTML5 Listing Template">
	<meta name="author" content="sprukotechnologies">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="#">
	<link rel="icon" href="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->favicon}}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/brand/favicon.ico') }}" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>


	<!-- Title -->
	<title>{{ config('app.name') }}</title>

	<!-- Bootstrap Css -->
	<link id="style" href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

	<!-- Dashboard Css -->
	<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('frontend/assets/css/plugins.css') }}" rel="stylesheet" />
    @stack('plugins-css')

	<!-- Font-awesome  Css -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/icons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    @stack('custom-css')
    <style>
        .hide{
            display: none;
        }
    </style>

</head>

<body class="">

	<!--Loader-->
	<div id="global-loader">
		<img src="{{ asset('frontend/assets/images/other/loader.svg') }}" class="loader-img floating" alt="">
	</div>

    @include('frontend/layout/header')

    @yield('main')

    @include('frontend/layout/footer',['footer_category' => \App\Models\Category::latest()->take(4)->get(), 'footer_featured' => \App\Models\AdPost::where('status', 1)->whereNotNull('featured_id')->where('featured_expiry_date', '>=', \Carbon\Carbon::now())->latest()->take(4)->get(), 'footer_latest' => \App\Models\AdPost::where('status', 1)->where('expiry_date', '>=', \Carbon\Carbon::now())->latest()->take(4)->get()  ])

    @stack('all-modals')

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-rocket"></i></a>

	<!-- JQuery js-->
	<script src="{{ asset('frontend/assets/js/vendors/jquery.min.js') }}"></script>

	<!-- Bootstrap js -->
	<script src="{{ asset('frontend/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>



	<!--JQuery Sparkline Js-->
	<script src="{{ asset('frontend/assets/js/vendors/jquery.sparkline.min.js') }}"></script>

	<!-- Circle Progress Js-->
	<script src="{{ asset('frontend/assets/js/vendors/circle-progress.min.js') }}"></script>

	<!-- Star Rating Js-->
	<script src="{{ asset('frontend/assets/plugins/ratings-2/jquery.star-rating.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/ratings-2/star-rating.js') }}"></script>

	<!--Owl Carousel js -->
	<script src="{{ asset('frontend/assets/plugins/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/owl-carousel.js') }}"></script>

	<!--Horizontal Menu-->
	<script src="{{ asset('frontend/assets/plugins/Horizontal2/Horizontal-menu/horizontal.js') }}"></script>

	<!--JQuery TouchSwipe js-->
	<script src="{{ asset('frontend/assets/js/jquery.touchSwipe.min.js') }}"></script>

	<!--Select2 js -->
	<script src="{{ asset('frontend/assets/plugins/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/select2.js') }}"></script>

	<!-- Cookie js -->
	<script src="{{ asset('frontend/assets/plugins/cookie/jquery.ihavecookies.js') }}"></script>
	<script src="{{ asset('frontend/assets/plugins/cookie/cookie.js') }}"></script>

	<!-- P-scroll bar Js-->
	<script src="{{ asset('frontend/assets/plugins/pscrollbar/pscrollbar.js') }}"></script>

	<!-- sticky Js-->
	<script src="{{ asset('frontend/assets/js/sticky.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/custom-sticky.js') }}"></script>

	<!-- Swipe Js-->
	<script src="{{ asset('frontend/assets/js/swipe.js') }}"></script>

	<!-- theme color Js-->
	<script src="{{ asset('frontend/assets/js/themeColors.js') }}"></script>

	<!-- Switcher Styles Js-->
	<script src="{{ asset('frontend/assets/js/switcher-styles.js') }}"></script>

    @stack('plugins-js')

	<!-- Custom Js-->
	<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    {{-- Toastr js config --}}
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    toastr.error('{{ $error }}');
                </script>
            @endforeach
        @endif

        @if (session()->get('warning'))
            <script>
                toastr.warning('{{ session()->get("warning") }}');
            </script>
        @endif

        @if (session()->get('success'))
        <script>
            toastr.success('{{ session()->get("success") }}');
        </script>
        @endif

        @if (session()->get('error'))
        <script>
            toastr.error('{{ session()->get("error") }}');
        </script>
        @endif


    @stack('custom-js')

</body>

</html>
