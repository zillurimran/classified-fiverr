@extends('frontend.layout.main')

@section('categories-page-menu', 'active')

@push('custom-css')
	<style>
		.item-card-img .embed-responsive-item{
			object-fit: cover;
		}
	</style>
@endpush

@section('main')
	<!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white ">
                        <h1 class="">Categories</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Categories</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

	<!--Categories-->
	<section class="sptb bg-white">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>{{ $titles->category_title }}</h1>
				<p>{{ $titles->category_subTitle }}</p>
			</div>
			<div class="row">
				@foreach($categories as $category)
				<div class="col-xl-3 col-lg-6 col-md-6">
					<div class="card">
						<div class="item-card">
							<div class="item-card-desc">
								<a href="{{route('category.ads', $category->id)}}"></a>
								<div class="item-card-img embed-responsive embed-responsive-4by3">
									<img src="{{asset('uploads/categories')}}/{{$category->bg_image ?? 'common.jpg'}}" alt="img" class="embed-responsive-item">
								</div>
								<div class="item-card-text">
									<h4 class="mb-0">{{$category->name}}<span>{{getPostCount($category->id)}}</span></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--/Categories-->
@endsection