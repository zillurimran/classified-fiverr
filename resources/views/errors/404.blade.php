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
	<meta name="keywords" content="classifieds,real estate,education online classess,jobs,business directory,coupons,cars,e-commerce,market place,auctions,tours & travels,domain marketPlace,books listing,doctors listing,rating & reviews,iCO list,wedding,knowledge base,softwares,video listing,booking html template,bootstrap 4 html template,buy templates,directory listing html template,html and css website templates,html app template,html5 web templates,modern html templates,premium bootstrap templates,responsive ui,html template,html5 template,ecommerce html template,directory listing html template,html css js templates,search html template,best ui kits,bootstrap 4 ui kit,bootstrap kit,css ui kit,flat ui kit,html ui kit,kit ui,multipurpose website ui kit,ui kit template,uikit css,web ui kit,website ui kit,wireframe kit,wireframe ui kit,bootstrap ui kit,dashboard ui kit,flat ui,flat ui design,uikit">
	<link rel="icon" href="{{ asset('frontend/assets/images/brand/favicon.ico') }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/brand/favicon.ico') }}" />
	<!-- Title -->
	<title>Page Not Found</title>

	<!-- Dashboard Css -->
	<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />

</head>
<body>
    <!-- Page -->
    <div class="page page-h">
        <div class="page-content z-index-10">
            <div class="container text-center">
                <div class="display-1 error-display mb-5">400</div>
                <h1 class="h2  mb-3">Page Not Found</h1>
                <p class="h4 font-weight-normal mb-7 leading-normal ">Oops!!!! you tried to access a page which is not available. go back to Home</p>
                <a class="btn btn-secondary" href="{{ route('home.page') }}">Back To Home</a>
            </div>
        </div>
    </div>
    <!-- End Page -->
</body>
</html>
