@extends('frontend.layout.main')

@section('home-page-menu', 'active')

@section('main')
	<!--Sliders Section-->
	<section>

		<div class="banner-1 cover-image sptb-2 sptb-tab bg-background2"
			data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
			<div class="header-text mb-0">
				<div class="container">
					{{-- <div class="text-center text-white">
						<h1 class="mb-1">{{ $titles->banner_title }}</h1>
						<p>{{ $titles->banner_subTitle }}</p>
					</div> --}}
					<div class="row">
						<div class="col-xl-10 col-lg-12 col-md-12 d-block mx-auto">
							<div class="item-search-tabs classifieds-content">
								{{-- <div class="item-search-menu">
									<ul class="nav justify-content-center py-0">
										@foreach($categories as $category)
											<li>
												<a href="#tab{{$category->id}}" data-bs-toggle="tab" @if ($loop->first) class="active" @endif>{{$category->name}}</a>
											</li>
										@endforeach
									</ul> --}}

									{{-- @foreach($categories->chunk(9) as $chunk)
									<ul class="nav my-1">
										@foreach($chunk as $category)
											<li><a href="#tab{{$category->id}}" data-bs-toggle="tab">{{$category->name}}</a></li>
										@endforeach
									</ul>
									@endforeach --}}
								{{-- </div> --}}
								<div class="tab-content">
                                @foreach($categories as $category)
									<div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="tab{{$category->id}}">
										<form action="{{ route('categorySearch', $category->id) }}" method="get">
                                            @csrf
                                            <div class="form row">
                                                <div class="form-group  col-xl-6 col-lg-5 col-md-12 mb-0">
                                                    <input type="text" class="form-control border-0" name="category" id="classified-text" placeholder="Business name or category">

                                                </div>
                                                <div class="form-group col-xl-6 col-lg-7 col-md-12 mb-0">
                                                    <div class="row g-0 bg-white br-2">
                                                        <div class="form-group  col-xl-8 col-lg-7 col-md-12 mb-0">
                                                            <select name="country_id" class="form-control select2-show-search" data-placeholder="Select" id="country">
                                                                {{-- <optgroup label="Categories"> --}}

                                                                <option disabled selected> Select Country </option>
                                                                @foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                                                @endforeach
                                                            {{-- </optgroup> --}}
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-5 col-md-12 mb-0">
                                                            <button type="submit" class="btn btn-block btn-secondary fs-13">
                                                                <i class="fa fa-search"></i> Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /header-text -->
		</div>

	</section>
	<!--Sliders Section-->
    <!--Video section-->

    <section>
         <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tab-content">
                        <div class="tab-pane active" id="playlist-item-1" role="tabpanel">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/HqU3OVgy3G" loading="lazy" title="k" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="tab-pane" id="playlist-item-2" role="tabpanel">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/DjX_BIGcDYE" loading="lazy" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
						<div class="card-header">
							<h3 class="card-title">Playlist</h3>
						</div>
						<div class="card-body">
							<ul class="nav vertical-scroll w-100" style="overflow-y: auto; max-height: 400px;"  role="tablist">
                                <li class="news-item w-100">
                                    <button class="nav-link active text-start border-0 w-100" role="tab" data-bs-toggle="tab" data-bs-target="#playlist-item-1" aria-selected="true">
                                        <table cellpadding="4" class="w-100">
                                            <tbody><tr>
                                                <td><img src="../assets/images/products/6.png" class="w-8 bg-secondary border"></td>
                                                <td><h5 class="mb-1 ">Best New Model Shoes</h5><a href="#" class="btn-link">View Details</a><span class="float-end font-weight-bold">$17</span></td>
                                            </tr>
                                        </tbody></table>
                                    </button>
								</li>
                                <li class="news-item w-100">
                                    <button class="nav-link text-start border-0 w-100" role="tab" data-bs-toggle="tab" data-bs-target="#playlist-item-2" aria-selected="false">
                                        <table cellpadding="4" class="w-100">
                                            <tbody><tr>
                                                <td><img src="../assets/images/products/7.png" class="w-8 bg-secondary border"></td>
                                                <td><h5 class="mb-1 ">Trending New Model Shoes</h5><a href="#" class="btn-link">View Details</a><span class="float-end font-weight-bold">$17</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </button>
								</li>
							</ul>
						</div>
					</div>
                </div>
             </div>
         </div>
    </section>

    <!-- Nav tabs -->
    {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
        </li>
        <li class="nav-item" role="presentation">
        <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</button>
        </li>
    </ul> --}}

  {{-- <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">1</div>
    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">2</div>
    <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">3</div>
    <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">4</div>
  </div> --}}

  	<!--Blogs-->
	<section class="sptb">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>{{ $titles->blog_title }}</h1>
				<p>{{ $titles->blog_subTitle }}</p>
			</div>
			<div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
                @foreach ($blogs as $blog)
                    <div class="item">
                        <div class="card mb-0">
                            <div class="item7-card-img">
                                @if ($blog->video_link && $blog->image == '')
                                    <iframe width="370" height="225" src="https://www.youtube.com/embed/{{ $blog->video_link }}" class="w-100" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                @elseif($blog->image && $blog->video_link == '')
                                        <a href="{{ route('blog.details.page', $blog->slug) }}"></a>
                                        <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="img" class="cover-image">
                                    @else
                                @endif
                                {{-- <img src="{{ asset('uplaods/blogs') }}/{{ $blog->image }}" alt="img" class="cover-image"> --}}
                            </div>
                            <div class="card-body p-4">
                                <div class="item7-card-desc d-flex mb-2">
                                    <a href="#"><i class="fa fa-calendar-o text-muted me-2"></i>{{$blog->created_at->format('d-m-Y')}}</a>
                                    <div class="ms-auto">
                                        <a href="#"><i class="fa fa-comment-o text-muted me-2"></i>{{ count(\App\Models\BlogComment::where('blog_id', $blog->id)->get()) }} Comments</a>
                                    </div>
                                </div>
                                <a href="{{ route('blog.details.page', $blog->slug) }}" class="text-dark">
                                    <h4 class="fs-20">{{Str::limit( $blog->title, 30, '...') }}</h4>
                                </a>
                                <p>{{ Str::limit($blog->sub_title, 130) }} </p>
                                <div class="d-flex align-items-center pt-2 mt-auto">
                                    <img src="{{ asset('frontend/assets/images/faces/male/5.jpg') }}" class="avatar brround avatar-md me-3"
                                        alt="avatar-img">
                                    <div>
                                        <a href="{{ route('blog.details.page', $blog->slug) }}" class="text-default">{{ App\Models\BlogCategory::where('id', $blog->id)->first()->name ?? "" }}</a>
                                        <small class="d-block text-muted">{{$blog->created_at->format('d-m-Y')}}</small>
                                    </div>
                                    {{-- <div class="ms-auto text-muted">
                                        <a href="javascript:void(0)" class="icon d-none d-md-inline-block ms-3"><i
                                                class="fe fe-heart me-1"></i></a>
                                        <a href="javascript:void(0)" class="icon d-none d-md-inline-block ms-3"><i
                                                class="fa fa-thumbs-o-up"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</section>


    <!--Ad category-->
	<section class="sptb">
		<div class="container">
            <div class="row">
                <div class="section-title center-block text-center">
                    <h1>Ad Categories</h1>
                    <p>All Ads Category</p>
                </div>

                @foreach ($adCategories as $categories)
                <div class="col-md-3">
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                                <div class="cat-item text-center">
                                    <a href="{{ route('ad.categories', $categories->id) }}"></a>
                                    <div class="cat-img">
                                        <img src="{{ asset('uploads/categoryIcons') }}/{{ $categories->icon }}" style="height:100px;width:100px" class="card-img-top" alt="Category Icon">
                                    </div>
                                    <div class="cat-desc">
                                        <h4 class="font-weight-semibold mb-0">{{ $categories->name }}</h4>
                                        <span>(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                @endforeach
			</div>

		</div>
	</section>



    <!--Directory category-->
	<section class="sptb">
		<div class="container">
            <div class="row">
                <div class="section-title center-block text-center">
                    <h1>Directory Categories</h1>
                    <p>All Directory Category</p>
                </div>

                @foreach ($directoryCategories as $categories)
                <div class="col-md-3">
                    <div class="item">
                        <div class="card">
                            <div class="card-body">
                                <div class="cat-item text-center">
                                    <a href="#"></a>
                                    <div class="cat-img">
                                        <img src="{{ asset('uploads/categoryIcons') }}/{{ $categories->icon }}" style="height:100px;width:100px" class="card-img-top" alt="Category Icon">
                                    </div>
                                    <div class="cat-desc">
                                        <h4 class="font-weight-semibold mb-0">{{ $categories->name }}</h4>
                                        <span>(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                @endforeach
			</div>

		</div>
	</section>



	<!--Locations-->
    @if(adCount() > 0)
        <section class="sptb bg-white">
            <div class="container">
                <div class="section-title center-block text-center">
                    <h1>{{ $titles->location_title }}</h1>
                    <p>{{ $titles->location_subTitle }}</p>
                </div>
                <div class="row">
                    @foreach($countries as $country)
                    @if(countCountryWisePost($country->id) > 0)
                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <div class="card border-0 overflow-hidden">
                            <div class="item-card">
                                <div class="item-card-desc">
                                    <a href="{{route('country.wise.post', $country->id)}}"></a>
                                    <div class="item-card-img">
                                        <img src="{{ asset('uploads/locations') }}/{{$country->bg_image ?? 'common.jpg'}}" alt="img"
                                            class="br-te-7 br-ts-7">
                                    </div>
                                    <div class="item-card-text">
                                        <h4 class="mb-0">{{countCountryWisePost($country->id)}}<span><i class="fa fa-map-marker me-1"></i> {{$country->country_name}}</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
	<!--Locations-->

	<!--Categories-->
    @if(adCount() > 0)
        <section class="sptb">
            <div class="container">
                <div class="section-title center-block text-center">
                    <h1>{{ $titles->category_title }}</h1>
                    <p>{{ $titles->category_subTitle }}</p>
                </div>
                <div id="small-categories" class="owl-carousel owl-carousel-icons2">
                    @foreach($homeCategories as $homeCategory)

                    @if(getPostCount($homeCategory->id) > 0)

                    <div class="item">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="cat-item text-center">
                                    <a href="{{route('category.ads', $homeCategory->id)}}"></a>
                                    <div class="cat-img">
                                        <img src="{{ asset('uploads/categories') }}/{{$homeCategory->image}}" alt="img">
                                    </div>
                                    <div class="cat-desc">
                                        <h5 class="mb-0">{{$homeCategory->name}} <span class="badge rounded-pill bg-secondary">{{getPostCount($homeCategory->id)}}</span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
	<!--/Categories-->

	<!--Featured Ads-->
    @if($featuredAds->count() > 0)
	<section class="sptb bg-white">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>{{ $titles->feature_title }}</h1>
				<p>{{ $titles->feature_subTitle }}</p>
			</div>
			<div id="myCarousel2" class="owl-carousel owl-carousel-icons2">
                @foreach ($featuredAds as $ad)
                    <div class="item">
                        <div class="card mb-0">
                            {{-- <div class="arrow-ribbon bg-danger">Featured</div> --}}
                            <div class="item-card7-imgs">
                                <a href="{{ route('ad.details', $ad->id) }}"></a>
                                @foreach ($ad->getAdImages as $image)
                                    @if($loop->first)
                                        <img src="{{ asset('uploads/adImages') }}/{{ $image->ad_images }}" alt="img" class="cover-image">
                                    @endif
                                @endforeach
                            </div>
                            <div class="item-card7-overlaytext">
                                <a href="{{ route('ad.details', $ad->id) }}"></a>
                                <h4 class="mb-0">${{ $ad->price }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="item-card7-desc">
                                    <div class="item-card7-text">
                                        <a href="{{ route('ad.details', $ad->id) }}"" class="text-dark">
                                            <h4 class="">{{ substr($ad->ad_title,0,25) }}</h4>
                                        </a>
                                    </div>
                                    <ul class="d-flex mb-0" style="justify-content: space-between">

                                        <li><a href="#" class="icons"><i class="si si-location-pin text-muted me-1"></i>
                                            {{$ad->getCountry->country_name}}
                                        </a></li>

                                        <li><a href="#" class="icons"><i class="si si-phone text-muted me-1"></i>{{$ad->phone}}</a></li>
                                    </ul>
                                    <p class="mb-0">{{substr( $ad->short_desc,0,50)}}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="footerimg d-flex mt-0 mb-0">
                                    <div class="d-flex footerimg-l mb-0">
                                        <img src="{{ asset('uploads/profile')}}/{{ $ad->getUser->profile_photo_path ?? 'default.jpg' }}" alt="image"
                                            class="avatar brround me-2">
                                        <h5 class="time-title text-muted p-0 leading-normal mt-2 mb-0">{{ $ad->getUser->name }} <i
                                                class="si si-check text-success fs-12 ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="verified"></i></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</section>
    @endif
	<!--/Featured Ads-->

	<!--Subscribe-->
	{{-- <section>
		<div class="about-1 cover-image sptb-2 bg-background-color"
			data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{generalSettings()->banner_image}}">
			<div class="content-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="mb-2">{{ $titles->subscribe_title }}</h1>
						<p class="fs-16">{{ $titles->subscribe_subTitle }}
						</p>
						<div class="row">
							<div class="col-lg-8 mx-auto d-block">
								<div class="mt-5">
                                        <div class="input-group sub-input mt-1">
                                            <input type="email" name="email" id="subscirbeMail" class="form-control input-lg "
                                                placeholder="Enter your Email">
                                            <div class="input-group-text border-0 bg-transparent p-0 ">
                                                <button id="subscribeBtn" class="btn btn-secondary btn-lg br-te-7 br-be-7">
                                                    Subscribe
                                                </button>
                                            </div>
                                        </div>
                                        <span id="succeessMessage"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
	<!--/Subscribe-->

	<!--Latest Ads-->
    @if($ads->count() > 0)
	<section class="sptb">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>{{ $titles->latest_ad_title }}</h1>
				<p>{{ $titles->latest_ad_subTitle }}</p>
			</div>
			<div id="myCarousel1" class="owl-carousel owl-carousel-icons2">
                @foreach ($ads as $ad)

                    <div class="item">
                        <div class="card mb-0">
                            {{-- <div class="power-ribbon power-ribbon-top-left text-warning"><span class="bg-warning">
                                <i class="fa fa-bolt"></i></span></div> --}}
                            <div class="item-card2-img">
                                <a href="{{ route('ad.details', $ad->id) }}"></a>
                                @foreach ($ad->getAdImages as $image)
                                    @if ($loop->first)
                                        <img src="{{ asset('uploads/adImages') }}/{{ $image->ad_images }}" alt="img" class="cover-image">
                                    @endif
                                @endforeach
                            </div>
                            <div class="item-card2-icons">
                                {{-- <a href="classified.html" class="item-card2-icons-l bg-warning"> <i
                                        class="fa fa-cutlery"></i></a> --}}
                                {{-- <a href="#" class="item-card2-icons-r bg-secondary"><i class="fa fa fa-heart-o"></i></a> --}}
                            </div>
                            <div class="card-body">
                                <div class="item-card2">
                                    <div class="item-card2-desc">
                                        <p class="">{{ $ad->getCategory->name }} </p>
                                        <ul class="d-flex justify-content-between">
                                            <li class=""><a href="{{ route('ad.details', $ad->id) }}" class="icons">
                                                <i class="si si-location-pin text-muted me-1"></i>{{ $ad->getCountry->country_name ?? '' }}</a>
                                            </li>
                                            <li><a href="#" class="icons">
                                                <i class="si si-event text-muted me-1"></i>{{$ad->created_at->format('d-m-Y')}}</a>
                                            </li>
                                        </ul>
                                        <div class="item-card2-text">
                                            <a href="{{ route('ad.details', $ad->id) }}" class="text-dark">
                                                <h4 class="">{{ substr($ad->ad_title,0,25) }}</h4>
                                            </a>
                                        </div>

                                        {{-- <div class="item-card2-rating mb-0">
                                            <div class=" d-inline-flex">
                                                <div class="rating-star sm my-rating-5" data-stars="4s">
                                                </div>(78)
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="item-card2-footer">
                                    <div class="item-card2-footer-u">
                                        <div class="icons text-dark"><i class="si si-user text-muted me-1"></i> {{ \App\Models\User::find($ad->user_id)->name }} <a
                                                href="#" class="ms-1" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Verified"><i class="si si-check text-success fs-12"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
			</div>
		</div>
	</section>
    @endif
	<!--Latest Ads-->

	<!--Testimonials-->
	<section class="sptb bg-white">
		<div class="container">
			<div class="section-title center-block text-center">
				<h1>{{ $titles->testimonial_title }}</h1>
				<p>{{ $titles->testimonial_subTitle }}</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="myCarousel" class="owl-carousel testimonial-owl-carousel">
						@foreach ($testimonials as $testimonial)
                            <div class="item text-center">
                                <div class="row">
                                    <div class="col-xl-8 col-md-12 d-block mx-auto">
                                        <div class="testimonia">
                                            <div class="testimonia-img mx-auto mb-3">

                                                    <img src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}"
                                                    class="img-thumbnail rounded-circle" style="height: 180px;width:180px" alt="User">
                                            </div>
                                            <p>
                                                <i class="fa fa-quote-left"></i>
                                                {{ $testimonial->description }}
                                            </p>
                                            <div class="testimonia-data">
                                                <h4 class="">{{ $testimonial->name }}</h4>
                                                <div class="rating-star sm my-rating-5" data-stars="{{ $testimonial->star }}s">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/Testimonials-->


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#subscribeBtn').on('click', function(e){
                e.preventDefault();
                let email = $('#subscirbeMail').val();
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
                        $('#subscirbeMail').val('');
                        window.setTimeout(function () {
                            $('#succeessMessage').html('<h2>Subscribe !</h2>');
                        }, 2000);

                    },
                    error: function(err){
                        $('#subscribeMail').val('');
                        window.setTimeout(function () {
                            $('#succeessMessage').html('<h2>you are already subscribed !</h2>');
                        }, 1000);

                    }
                });
            });
        });

    </script>
@endsection

{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-tag').select2();
    });
</script> --}}
