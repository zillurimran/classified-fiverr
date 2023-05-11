@extends('frontend.layout.main')
@section('ads-page-menu', 'active')
@section('main')
<section>
    <div class="header-2">
        <div class="banner-1 cover-image sptb-2 bg-background" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text1 mb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
                            <div class="text-center text-white ">
                                <h1 class=""><span class="font-weight-bold">{{ adCount() }}</span> Posts Available in {{ config('app.name') }}</h1>
                            </div>
                            <form action="{{route('banner.search')}}" method="post">
								@csrf
							<div class=" search-background">
								<div class="form row g-0">
									<div class="form-group  col-xl-6 col-lg-5 col-md-12 mb-0">
										<input type="text" name="search_string" class="form-control input-lg border-end-0" id="text" placeholder="Search here...">
									</div>
									<div class="form-group col-xl-4 col-lg-4 select2-lg  col-md-12 mb-0">
										<select class="form-control select2-show-search border-bottom-0 w-100" name="country_id" data-placeholder="Select">
											<optgroup label="Country">
												<option value=" ">All</option>
												@foreach($countries as $country)
													<option value="{{$country->id}}">{{ ucfirst($country->country_name)}}</option>
												@endforeach
											</optgroup>
										</select>
									</div>
									<div class="col-xl-2 col-lg-3 col-md-12 mb-0">
										<button type="submit" class="btn btn-lg btn-block btn-secondary">Search</button>
									</div>
								</div>
							</div>
						</form>
                        </div>
                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
    </div>
</section>
<section>
    <!--Breadcrumb-->
    <div class="bg-white border-bottom">
        <div class="container">
            <div class="page-header">
                {{-- <h4 class="page-title">{{ucfirst($countryDetail->country_name)}}</h4> --}}
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Ads</li>
                </ol>
            </div>
        </div>
    </div>
    <!--/Breadcrumb-->
</section>
<!--Add listing-->
<section class="sptb">
	<div class="container">
		<div class="row">

			<!--Add lists-->
			<div class="col-xl-9 col-lg-8 col-md-12">
				<div class="card mb-lg-0">
					<div class="card-body">
						<div class="item2-gl ">
							
							<div class="tab-content">
								@forelse($posts as $post)
								{{-- @if(\Carbon\Carbon::parse($post->created_at)->addDays($post->getPackage->days) > \Carbon\Carbon::today()) --}}
								<div class="tab-pane active" id="tab-11">
									<div class="card overflow-hidden">
										<div class="d-md-flex">
											<div class="item-card9-img">
                                                @if($post->featured_id)
												<div class="arrow-ribbon bg-primary">Featured</div>
                                                @else
                                                <div class="arrow-ribbon bg-danger">Latest</div>
                                                @endif
												<div class="item-card9-imgs">
													<a href="{{route('ad.details', $post->id)}}"></a>
													@foreach($post->getAdImages as $image)
													@if($loop->first)
													<img src="{{asset('uploads/adImages')}}/{{$image->ad_images}}" alt="img" class="cover-image">
													@endif
													@endforeach
												</div>
												{{-- <div class="item-card9-icons">
													<a href="" class="item-card9-icons1 wishlist react"> <i class="fa fa fa-heart-o"></i></a>
												</div> --}}
											</div>
											<div class="card border-0 mb-0">
												<div class="card-body ">
													<div class="item-card9">
                                                       
														{{ $post->getCategory->name }}
														
														<a href="{{route('ad.details', $post->id)}}" class="text-dark"><h4 class="font-weight-semibold mt-1">{{$post->ad_title}} </h4></a>
														<p class="mb-0 leading-tight">{{$post->short_desc}}</p>
													</div>
												</div>
												<div class="card-footer py-4">
													<div class="item-card9-footer d-flex">
														<div class="item-card9-cost">
															<h4 class="text-dark font-weight-semibold mb-0 mt-0">{{'$'.$post->price}}</h4>
														</div>
														<i class="fa fa fa-heart-o ms-auto"></i> {{$post->reacts}}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{-- @endif --}}
								@empty
								<p>Nothing Found!</p>
								@endforelse
								
							</div>
						</div>
						
						{!! $posts->links() !!}
					</div>
				</div>
			</div>
			<!--/Add lists-->

			<!--Right Side Content-->
			<div class="col-xl-3 col-lg-4 col-md-12">
				<div class="card">
					<div class="card-body">
						<form action="{{route('banner.search')}}"  method="post">
							@csrf
						<div class="input-group">
							<input type="text" name="search_string" class="form-control br-ts-7 br-bs-7" placeholder="Search">
							<div class="input-group-text border-0 bg-transparent p-0 ">
								<button type="submit" class="btn btn-primary br-te-7 br-be-7">
									Search
								</button>
							</div>
						</div>
					</form>
					</div>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Categories</h3>
					</div>
					<div class="card-body">
						<div class="" id="container">
							<div class="filter-product-checkboxs">
								@foreach($categories as $category)
								@if(getPostCount($category->id))
								<label class="custom-control mb-3">
									<span class="">
										<a href="{{route('category.ads', $category->id)}}" class="text-dark" style="margin-left: -25px">{{$category->name}}<span class="float-end">{{getPostCount($category->id)}}</span></a>
									</span>
								</label>
								@endif
								@endforeach
							</div>
						</div>
					</div>		
				</div>
				
			</div>
			<!--Right Side Content-->
		</div>
	</div>
</section>
<!--Add Listing-->
@endsection