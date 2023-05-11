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
                                <h1 class=""><span class="font-weight-bold">{{ adCount() }}</span> Posts Available in {{config('app.name')}}</h1>
                            </div>
                            <div class=" search-background">
                                <div class="form row g-0">
                                    <div class="form-group  col-xl-6 col-lg-5 col-md-12 mb-0">
                                        <input type="text" class="form-control input-lg border-end-0" id="text" placeholder="Search here...">
                                    </div>
                                    <div class="form-group col-xl-4 col-lg-4 select2-lg  col-md-12 mb-0">
                                        <select class="form-control select2-show-search border-bottom-0 w-100" data-placeholder="Select">
                                            <optgroup label="Categories">
                                                <option value="1">All</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{ ucfirst($category->name)}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-12 mb-0">
                                        <a href="#" class="btn btn-lg btn-block btn-secondary">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
    </div>
</section>
<section>

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
								@foreach($posts as $post)
								
								<div class="tab-pane active" id="tab-11">
									<div class="card overflow-hidden">
										<div class="d-md-flex">
											<div class="item-card9-img">
												
												<div class="item-card9-imgs">
													<a href="{{route('ad.details', $post->id)}}"></a>
													@foreach($post->getAdImages as $image)
													@if($loop->first)
													<img src="{{asset('uploads/adImages')}}/{{$image->ad_images}}" alt="img" class="cover-image">
													@endif
													@endforeach
												</div>
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
															<h4 class="text-dark font-weight-semibold mb-0 mt-0">{{'$'.$post->getPackage->package_price}}</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								@endforeach
								
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
						<div class="input-group">
							<input type="text" class="form-control br-ts-7 br-bs-7" placeholder="Search">
							<div class="input-group-text border-0 bg-transparent p-0 ">
								<button type="button" class="btn btn-primary br-te-7 br-be-7">
									Search
								</button>
							</div>
						</div>
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