@extends('frontend.layout.main')

@section('main')
    <section>
        <div class="header-2">
			<div class="banner-1 cover-image sptb-2 bg-background" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
				<div class="header-text1 mb-0">
					<div class="container">
						<div class="row">
							<div class="col-xl-8 col-lg-12 col-md-12 d-block mx-auto">
								<div class="text-center text-white ">
									<h1 class=""><span class="font-weight-bold">{{ getPostCount($post->category_id) }}</span> Posts Available in {{ucfirst($post->getCategory->name)}}</h1>
								</div>
								<form action="{{route('banner.search')}}" method="post">
									@csrf
								<div class=" search-background">
									<div class="form row g-0">
										<div class="form-group  col-xl-6 col-lg-5 col-md-12 mb-0">
											<input type="text" name="search_string" class="form-control input-lg border-end-0" id="text" placeholder="Search {{$post->getCategory->name}}">
										</div>
										<div class="form-group col-xl-4 col-lg-4 select2-lg  col-md-12 mb-0">
											<select class="form-control select2-show-search border-bottom-0 w-100" name="category_id" data-placeholder="Select">
												<optgroup label="Categories">
													<option value=" ">All</option>
                                                    @foreach($categories as $category)
													    <option value="{{$category->id}}">{{ ucfirst($category->name)}}</option>
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
					<h4 class="page-title">{{ucfirst($post->getCategory->name)}}</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
						<li class="breadcrumb-item"><a href="{{route('all.categories')}}">Categories</a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ucfirst($post->getCategory->name)}}</li>
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
					<div class="col-xl-8 col-lg-8 col-md-12">
						<div class="card overflow-hidden">
							
							<div class="card-body h-100 primo-slider">
								<div class="item-det mb-4">
									<a  class="text-dark"><h3 class="">{{$post->ad_title}}</h3></a>
									<div class=" d-flex">
										<ul class="d-flex mb-0">
											<li class="me-5"><a href="{{route('category.ads', $post->category_id)}}" class="icons"><i class="si si-briefcase text-muted me-1"></i> {{ucfirst($post->getCategory->name)}}</a></li>
											<li class="me-5"><a href="{{route('country.wise.post', $post->country_id)}}" class="icons"><i class="si si-location-pin text-muted me-1"></i>{{$post->getCountry->country_name }}</a></li>
											<li class="me-5"><a  class="icons"><i class="si si-calendar text-muted me-1"></i> {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</a></li>
											<li class="me-5"><a  class="icons"><i class="si si-eye text-muted me-1"></i> {{$post->views}}</a></li>
										</ul>
										
										<div class="d-flex">
											<div class="me-2">
												<div class="">
													<i class="fa fa-heart text-danger"></i>
												</div>
											</div> <span class="reactCount">{{$post->reacts}}</span>
										</div>
									</div>
								</div>
								<div class="product-slider carousel-slide-2">
									<div id="carouselFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
										data-bs-loop="false" data-bs-thumb="true">
										<div class="arrow-ribbon2 bg-primary">{{'$'.$post->price}}</div>
										<div class="carousel-inner slide-show-image" id=full-gallery>
                                            @foreach($post->getAdImages as $image)  
                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <img src="{{asset('uploads/adImages')}}/{{$image->ad_images}}" alt="img" style="max-height: 436px">
                                                </div>
                                            @endforeach
											<div class="thumbcarousel">
												<a class="carousel-control-prev" href="#carouselFade" role="button"
													data-bs-slide="prev">
													<i class="fa fa-angle-left" aria-hidden="true"></i>
												</a>
												<a class="carousel-control-next" href="#carouselFade" role="button"
													data-bs-slide="next">
													<i class="fa fa-angle-right" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--Description-->
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Description</h3>
							</div>
							<div class="card-body">
								<div class="mb-4">
									<p>{{$post->short_desc}}</p>
								</div>
								<h4 class="mb-4">Specifications</h4>
								<div class="row">
									<div class="col-xl-6 col-md-12">
										{!! $post->long_desc !!}
									</div>
								</div>

							</div>
							<div class="card-body">
								<div class="list-id">
									<div class="row">
										@if($post->property_id)
										<div class="col">
											<a class="mb-0">Property ID : {{$post->property_id}}</a>
										</div>
										@endif
										<div class="col col-auto">
											Posted By <a class="mb-0 font-weight-bold">{{$post->getUser->name}}</a> / {{date("M jS 'y",strtotime($post->created_at))}}
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="icons">
									
									{{-- <a href="#" class="btn btn-info icons"><i class="si si-share me-1"></i> Share Ad</a> --}}
									{{-- <a href="#" class="btn btn-danger icons" data-bs-toggle="modal" data-bs-target="#report"><i class="si si-exclamation me-1"></i> Report Abuse</a> --}}
									<a href="#" class="btn btn-secondary icons react"  id="react" data-id="{{$post->id}}"><i class="si si-heart  me-1"></i><span class="reactCount">{{$post->reacts}}</span></a>
									{{-- <a href="" class="btn btn-secondary icons"><i class="si si-printer  me-1"></i> Print</a> --}}
								</div>
							</div>
						</div>
						<!--Description-->
						@if($relatedPosts->count() > 0)
						<h3 class="mb-5 mt-4">Related Posts</h3>
						@endif
						<!--Related Posts-->
						<div id="myCarousel3" class="owl-carousel owl-carousel-icons3">
							<!-- Wrapper for carousel items -->
                            @foreach($relatedPosts as $related)
							{{-- @if(\Carbon\Carbon::parse($related->created_at)->addDays($related->getPackage->days) > \Carbon\Carbon::today()) --}}
							<div class="item">
								<div class="card">
									{{-- <div class="arrow-ribbon bg-danger">sale</div> --}}
									<div class="item-card7-img">
										<div class="item-card7-imgs">
											<a href="{{route('ad.details', $related->id)}}"></a>
                                           
											<img src="{{asset('uploads/adImages')}}/{{ getRelatedImage($post->id)}}" alt="img" class="cover-image">
                                           
										</div>
										<div class="item-card7-overlaytext">
											<a href="{{route('category.ads', $related->category_id)}}" class="text-white">{{$related->getCategory->name}}</a>
											<h4  class="font-weight-semibold mb-0">{{'$'.$related->getPackage->package_price}}</h4>
										</div>
									</div>
									<div class="card-body">
										<div class="item-card7-desc">
											<a href="{{route('ad.details', $related->id)}}" class="text-dark"><h4 class="font-weight-semibold">{{$related->ad_title}}</h4></a>
										</div>
										<div class="item-card7-text">
											<ul class="icon-card mb-0">
												<li class=""><a href="{{route('country.wise.post', $related->country_id)}}" class="icons"><i class="si si-location-pin text-muted me-1"></i>  {{$related->getCountry->country_name}} </a></li>
												<li><a class="icons"><i class="si si-event text-muted me-1"></i> {{\Carbon\Carbon::parse($related->created_at)->diffForHumans()}}</a></li>
												<li class="mb-0"><a href="{{route('users.ad', $related->user_id)}}" class="icons"><i class="si si-user text-muted me-1"></i> {{$related->getUser->name}}</a></li>
												<li class="mb-0"><a href="tel:+{{$related->phone}}" class="icons"><i class="si si-phone text-muted me-1"></i> {{ $related->phone }}</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							{{-- @endif --}}
                            @endforeach
							
						</div>
						
						

						<!--Comments-->
						<div class="card">
							<div class="card-body p-0">
								{{-- @if($post->getComments->count() > 0) --}}
								@foreach($comments as $comment)
								<div class="media mt-0 p-5">
                                    <div class="d-flex me-3">
                                        <a href="#"><img class="media-object brround" alt="64x64" src="{{asset('uploads/profile')}}/{{$post->getUser->profile_photo_path ?? 'default.jpg'}}"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-semibold">{{ucwords($comment->name)}}
											@if(Auth::user())
												<span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
											@endif
											{{-- <span class="fs-14 ms-2"> 4.5 <i class="fa fa-star text-yellow"></i></span> --}}
										</h5>
										<small class="text-muted"><i class="fa fa-calendar"></i> {{$comment->created_at->format('M jS')}}  <i class=" ms-3 fa fa-clock-o"></i> {{$comment->created_at->format('h:m')}}</small>
                                        <p class="font-13  mb-2 mt-2">
                                          {{$comment->comment}}
                                        </p>
										{{-- <a href="#" class="me-2"><span class="badge bg-primary">Helpful</span></a> --}}
										<a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#Reply{{$comment->id}}"><span class="">Reply</span></a>
										{{-- <a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#report{{$comment->id}}"><span class="">Report</span></a> --}}
										@if($comment->getReplies->count() > 0)
										@foreach($comment->getReplies as $reply)
                                        <div class="media mt-5">
                                            <div class="d-flex me-3">
                                                <a href="#"> <img class="media-object brround" alt="64x64" src="{{asset('uploads/profile')}}/{{'default.jpg'}}"> </a>
                                            </div>
											<div class="media-body">
												<h5 class="mt-0 mb-1 font-weight-semibold">{{ucwords($reply->name)}} <span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h5>
												<small class="text-muted"><i class="fa fa-calendar"></i>{{$reply->created_at->format('M jS')}}  <i class=" ms-3 fa fa-clock-o"></i> {{$reply->created_at->format('h:m')}} </small>
												<p class="font-13  mb-2 mt-2">
												  {{$reply->replies}}
												</p>
												<a href="" data-bs-toggle="modal" data-bs-target="#Reply{{$comment->id}}"><span class="badge badge-default">Reply</span></a>
												<a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#report"><span class="">Report</span></a>
											</div>
										</div>
										@endforeach
										@endif
									</div>
								</div>

								<!--Reply Modal -->
								<div class="modal fade replyModal" id="Reply{{$comment->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleCommentLongTitle">Leave a Reply</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<form action="{{route('reply.store')}}" method="post">
												@csrf
											<div class="modal-body">
												<input type="hidden" name="comment_id" value="{{$comment->id}}" data-id="{{$comment->id}}">
												<div class="form-group">
													<input type="text" class="form-control"  name="name" value="{{Auth::user()->name ?? ''}}" placeholder="Your Name">
													@error('reply_name')
													<small class="text-danger">{{$message}}</small>
													@enderror
												</div>
												<div class="form-group">
													<input type="email" class="form-control" name="email" value="{{Auth::user()->email ?? ''}}" placeholder="Email Address">
													@error('reply_email')
													<small class="text-danger">{{$message}}</small>
													@enderror
												</div>
												<div class="form-group mb-0">
													<textarea class="form-control" name="replies" id="reply_message" rows="6" placeholder="Message"></textarea>
													@error('message')
													<small class="text-danger">{{$message}}</small>
													@enderror
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="send_Reply">Send</button>
											</div>
										</form>
										</div>
									</div>
								</div>
								@endforeach
								{{-- @endif --}}
								{{-- <div class="media p-5 border-top mt-0">
									<div class="d-flex me-3">
										<a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/faces/male/3.jpg"> </a>
									</div>
									<div class="media-body">
										<h5 class="mt-0 mb-1 font-weight-semibold">Edward
										<span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
										<span class="fs-14 ms-2"> 4 <i class="fa fa-star text-yellow"></i></span>
										</h5>
										<small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st  <i class=" ms-3 fa fa-clock-o"></i> 16.35  <i class=" ms-3 fa fa-map-marker"></i> UK</small>
                                        <p class="font-13  mb-2 mt-2">
                                           Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                        </p>
										<a href="#" class="me-2"><span class="badge bg-primary">Helpful</span></a>
										<a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#Comment"><span class="">Comment</span></a>
										<a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#report"><span class="">Report</span></a>
									</div>
								</div> --}}
							</div>
						</div>
						<!--/Comments-->

						<div class="card mb-lg-0">
							<div class="card-header">
								<h3 class="card-title">Leave a Comment</h3>
							</div>
							<div class="card-body">
								<div>
									<div class="form-group">
										<input type="text" class="form-control" id="commenter_name" value="{{Auth::user()->name ?? ''}}" placeholder="Your Name">
									</div>
									<div class="form-group">
										<input type="email" class="form-control" id="commenter_email" value="{{Auth::user()->email ?? ''}}" placeholder="Email Address">
									</div>
									<div class="form-group">
										<textarea class="form-control" id="comment" name="example-textarea-input"  rows="6" placeholder="Comment"></textarea>
									</div>
									<a href="#" id="ad_comment" class="btn btn-primary">Send Comment</a>
								</div>
								<div class="alert alert-primary mt-2 hide text-center" id="commentSuccess">Comment Send Successfully</div>
								<div class="alert alert-danger mt-2 hide  commentDanger" id="commentDanger"></div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-12">
						<!--Right Side Section-->
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Posted By</h3>
							</div>
							<div class="card-body  item-user">
								<div class="profile-pic mb-0">
									<img src="{{asset('uploads/profile')}}/{{$post->getUser->profile_photo_path ?? 'default.jpg'}}" class="brround avatar-xxl" alt="user">
									<div class="">
										<a href="" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">{{ucfirst($post->getUser->name)}}</h4></a>
										{{-- <span class="text-gray">Property Holder</span><br> --}}
										<span class="text-muted">Member Since {{date("F Y", strtotime($post->getUser->created_at))}}</span>
										<h6 class="mt-2 mb-0"><a href="{{route('users.ad', $post->user_id)}}" class="btn btn-primary btn-sm">See All Ads</a></h6>
									</div>

								</div>
							</div>
							<div class="card-body item-user">
								<h4 class="mb-4">Contact Info</h4>
								<div>
									<h6><span class="font-weight-semibold"><i class="fa fa-envelope me-2 mb-2"></i></span><a href="mailto:{{$post->getUser->email}}" class="text-body"> {{$post->getUser->email}}</a></h6>
									@if($post->getUser->phone)
									<h6><span class="font-weight-semibold"><i class="fa fa-phone me-2  mb-2"></i></span><a href="tel:+{{$post->getUser->phone}}" class="text-primary">{{$post->phone}}</a></h6>
									@endif
									@if($post->website != "Null")
										<h6><span class="font-weight-semibold"><i class="fa fa-link me-2 "></i></span><a href="https://{{$post->website}}" target="_blank" class="text-primary">{{ $post->website }}</a></h6>
									@endif
								</div>
								<div class=" item-user-icons mt-4">
									@if($post->getUser->facebook_link)
									<a href="{{ $post->getUser->facebook_link }}" class="facebook-bg mt-0" target="_blank"><i class="fa fa-facebook"></i></a>
									@endif
									@if($post->getUser->twitter_link)
									<a href="{{ $post->getUser->twitter_link }}" class="twitter-bg" target="_blank"><i class="fa fa-twitter"></i></a>
									@endif
									@if($post->getUser->whatsapp_link)
									<a href="{{ $post->getUser->whatsapp_link }}" class="google-bg" target="_blank"><i class="fa fa-whatsapp"></i></a>
									@endif
									{{-- <a href="{{Auth::user()->linkedin_link}}" class="dribbble-bg"><i class="fa fa-linkedin"></i></a> --}}
								</div>
							</div>
							{{-- <div class="card-footer">
								<div class="text-start">
									<a href="#" class="btn  btn-info"><i class="fa fa-envelope"></i> Chat</a>
									<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contact"><i class="fa fa-user"></i> Contact Me</a>
								</div>
							</div> --}}
						</div>
						@if($post->getKeywords->count() > 0)
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Keywords</h3>
							</div>
							<div class="card-body product-filter-desc">
								<div class="product-tags clearfix">
									<ul class="list-unstyled mb-0">
										@foreach($post->getKeywords as $keyword)
										<li><a href="{{route('keyword.search', $keyword->id)}}">{{ucfirst($keyword->keyword)}}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						@endif
						
						{{-- <div class="card">
							<div class="card-header">
								<h3 class="card-title">Shares</h3>
							</div>
							<div class="card-body product-filter-desc">
								<div class="product-filter-icons text-center">
									<a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
									<a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
									<a href="#" class="google-bg"><i class="fa fa-google"></i></a>
									<a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a>
									<a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div> --}}
						@if($post->product_location)
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Map location</h3>
							</div>
							<div class="card-body">
								<div class="embed-responsive embed-responsive-16by9">
									{{-- <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe> --}}
									{!! $post->product_location !!}
								  </div>
							</div>
						</div>
						@endif
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Search Ads</h3>
							</div>
							<div class="card-body">
								<form action="{{route('banner.search')}}"  method="post">
									@csrf
								<div class="form-group">
									<input type="text" name="search_string" class="form-control" id="search_text" placeholder="What are you looking for?">
								</div>
								<div class="form-group">
									<select name="category_id" id="selected_category" data-id="{{$category->id}}" class="form-control form-select select2-show-search">
											<option value=" " selected>All Categories</option>
										@foreach($categories as $category)
											<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
								</div>
								<div class="">
									<button type="submit" class="btn  btn-primary" id="ad_search">Search</button>
								</div>
								 </form>
							</div>
						</div>

						<!--Related Posts-->
						<div class="card mb-0">
							<div class="card-header">
								<h3 class="card-title">Latest Posts</h3>
							</div>
							<div class="card-body">
								<div id="myCarousel4" class="owl-carousel testimonial-owl-carousel2">
									<!-- Wrapper for carousel items -->
									@forelse ($latestPosts as $latest)
									<div class="item">
										<div class="card mb-0">
											{{-- <div class="arrow-ribbon bg-danger">sale</div> --}}
											<div class="item-card7-img">
												<div class="item-card7-imgs">
													<a href="{{route('ad.details', $latest->id)}}"></a>
													@foreach($latest->getAdImages as $image)
													@if($loop->first)
													<img src="{{asset('uploads/adImages')}}/{{$image->ad_images}}" alt="img" class="cover-image">
													@endif
													@endforeach
												
												</div>
												<div class="item-card7-overlaytext">
													<a href="realestate.html" class="text-white"> {{$latest->getCategory->name}}</a>
													<h4  class="font-weight-semibold mb-0">{{'$'.$latest->getPackage->package_price}}</h4>
												</div>
											</div>
											<div class="card-body">
												<div class="item-card7-desc">
													<a href="realestate.html" class="text-dark"><h4 class="font-weight-semibold">{{$latest->ad_title}}</h4></a>
												</div>
												<div class="item-card7-text">
													<ul class="icon-card mb-0">
														<li class=""><a href="{{route('country.wise.post', $latest->country_id)}}" class="icons"><i class="si si-location-pin text-muted me-1"></i>  {{$latest->getCountry->country_name}}</a></li>
														<li><a class="icons"><i class="si si-event text-muted me-1"></i> {{$latest->created_at->diffForHumans()}}</a></li>
														<li class="mb-0"><a href="{{route('users.ad', $latest->user_id)}}" class="icons"><i class="si si-user text-muted me-1"></i> {{$latest->getUser->name}}</a></li>
														<li class="mb-0"><a href="tel:+{{$latest->phone}}" class="icons"><i class="si si-phone text-muted me-1"></i> {{$latest->phone}}</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									@empty
										<p>Nothing Found!</p>
									@endforelse
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection

@push('custom-js')
<script>
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
	$(document).ready(function(){
		$('#ad_search').on('click', function(){
			var search_string = $('#search_text').val()
			var category = $('#selected_category').attr('data-id')
			
			$.ajax({
				url:"{{route('search.ad')}}",
				method: 'get',
				data:{
					search_string:search_string,
					category:category,
				},success:function(res){
					console.log(res.data)
				}
			})
		})
	})
</script>
<script>
	$(document).ready(function(){
		
		$('.react').on('click', function(e){
			e.preventDefault();
			var post_id = $(this).attr('data-id')
			$.ajax({
				url:"{{route('update.react')}}",
				method:"get",
				data:{
					post_id: post_id,
				},success:function(res){
					$('.reactCount').text(res.data)
				
				}
			})
		})
	})
</script>
<script>
	$(document).ready(function(){
		$('#ad_comment').on('click', function(e){
			e.preventDefault();
			var name = $('#commenter_name').val()
			var email = $('#commenter_email').val()
			var comment = $('#comment').val()
			var ad_id = $('.react').attr('data-id')
			
			
			$.ajax({
				url:"{{route('adComment.store')}}",
				method:"post",
				data:{
					name:name,
					email:email,
					comment:comment,
					ad_id:ad_id

				},success:function(res){
					if(res.status == 'success'){
						$('#commentDanger').addClass('hide');
						$('#comment').val('')
						$('#commentSuccess').removeClass('hide')
						location.reload()
					}
				},error:function(err){
					let error = err.responseJSON;
                        $.each(error.errors,function(index, value){
								$('#commentDanger').html('');
								$('#commentDanger').removeClass('hide');
						 		$('#commentDanger').append('<li>'+value+'</li>');
								
                    })
				}
			})
		})
	})
</script>
<script>
	
</script>
<!--JQuery Slider  js-->
<script src="{{ asset('frontend/assets/plugins/primo-slider/primo-slider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/primo-slider.js') }}"></script>
@endpush
