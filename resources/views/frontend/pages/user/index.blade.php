

@extends('frontend.layout.main')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('app-assets/assets/plugins/quill/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endpush

@push('plugins-js')
    <script src="{{ asset('app-assets/assets/plugins/quill/js/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/plugins/quill/js/quill-image-resize.min.js') }}"></script>
@endpush


@push('custom-css')
    <style>
        .ql-editor {
            min-height: 200px
        }
    </style>
@endpush

@push('custom-js')

@endpush

@section('main')
    	<!--Breadcrumb-->
		<section>
			<div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
				<div class="header-text mb-0">
					<div class="container">
						<div class="text-center text-white ">
							<h1 class="">{{ Auth::user()->name }} Profile</h1>
							<ol class="breadcrumb text-center">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Profile</a></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Breadcrumb-->

		<!--User Profile-->
		<section class="sptb">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="wideget-user">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="wideget-user-desc text-start">
												<div class="wideget-user-img">
                                                    @if (Auth::user()->profile_photo_path)
                                                        <img class="brround" src="{{ asset('uploads/profile') }}/{{ Auth::user()->profile_photo_path }}" style="height: 100px;width: 100px" alt="img">
                                                    @else
                                                        <img class="brround" src="{{ asset('frontend') }}/assets/images/faces/male/25.jpg" style="height: 100px;width: 100px;border-radius: 50%" id='profilePhoto' alt="img">
                                                    @endif

												</div>
												<div class="user-wrap wideget-user-info">
													<a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ Auth::user()->name }}</h4></a>
													<h6 class="text-muted mb-3"><span class="text-dark">Member Since : </span> {{ Auth::user()->created_at->translatedFormat('j F Y') }}</h6>
													{{-- <div class="wideget-user-rating">
														<a href="#"><i class="fa fa-star text-warning"></i></a>
														<a href="#"><i class="fa fa-star text-warning"></i></a>
														<a href="#"><i class="fa fa-star text-warning"></i></a>
														<a href="#"><i class="fa fa-star text-warning"></i></a>
														<a href="#"><i class="fa fa-star-o text-warning me-1"></i></a> <span>5 (3876 Reviews)</span>
													</div> --}}
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="wideget-user-info widget-info-right mt-5 ">
												{{-- <div class="wideget-user-btn">
													<a href="#" class="btn btn-success mb-1"><i class="fa fa-rss"></i> Follow</a>
													<a href="#" class="btn btn-purple mb-1"><i class="fa fa-share-alt"></i> Share</a>
													<a href="#" class="btn btn-info mb-1"><i class="fa fa-envelope"></i> E-mail</a>
												</div> --}}
												<div class="wideget-user-icons mt-2">
													<a href="{{ Auth::user()->facebook_link }}" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a>
													{{-- <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a> --}}
													<a href="{{ Auth::user()->whatsapp_link }}" class="google-bg"><i class="fa fa-whatsapp"></i></a>
													<a href="{{ Auth::user()->linkedin_link }}" class="dribbble-bg"><i class="fa fa-linkedin"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="wideget-user-tab">
									<div class="tab-menu-heading">
										<div class="tabs-menu1">
											<ul class="nav">
												<li class=""><a href="#tab-5" class="active" data-bs-toggle="tab">Profile</a></li>
												<li><a href="#tab-6" data-bs-toggle="tab" class="">Edit Profile</a></li>
                                                <li><a href="#tab-10" data-bs-toggle="tab" class="">Change Password</a></li>
												<li>
                                                    <a href="#tab-7" data-bs-toggle="tab" class="">
                                                        My Ads
                                                        @if (count(\App\Models\AdPost::where('user_id', Auth::user()->id)->get()) > 0)
                                                            <span class="badge bg-primary rounded-pill">
                                                                {{ count(\App\Models\AdPost::where('user_id', Auth::user()->id)->get()); }}
                                                            </span>
                                                        @endif
                                                    </a>
                                                </li>
												<li>
                                                    <a href="#tab-8" data-bs-toggle="tab" class="">
                                                        Featured Ads
                                                        @if (count(\App\Models\AdPost::where('user_id', Auth::id())->orWhere('status', 1)->whereNull('featured_id')->get()) > 0)
                                                            <span class="badge bg-primary rounded-pill">
                                                                {{ count(\App\Models\AdPost::where('user_id', Auth::id())->where('featured_id', 1)->get()); }}
                                                            </span>
                                                        @endif
                                                    </a>
                                                </li>
												<li>
                                                    <a href="#tab-9" data-bs-toggle="tab" class="">
                                                        Published Ads
                                                        @if (count(\App\Models\AdPost::where('user_id', Auth::user()->id)->get()) > 0)
                                                            <span class="badge bg-primary rounded-pill">
                                                                {{ count(\App\Models\AdPost::where('user_id', Auth::user()->id)->get()); }}
                                                            </span>
                                                        @endif
                                                    </a>
                                                </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="card mb-0">
							<div class="card-body">
								<div class="border-0">
									<div class="tab-content">
										<div class="tab-pane active" id="tab-5">
											<div class="profile-log-switch">
												<div class="media-heading">
													<h3 class="card-title mb-3 font-weight-bold">Personal Details</h3>
												</div>
												<ul class="usertab-list mb-0">
													<li><a href="#" class="text-dark"><span class="font-weight-semibold">Full Name :</span> {{ Auth::user()->name }}</a></li>

                                                    {{-- @if(Auth::user()->country) --}}
													    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Location :</span>{{ Auth::user()->country ?? 'Not Provided' }}</a></li>
                                                    {{-- @endif --}}

                                                    {{-- @if(Auth::user()->website) --}}
													    <li><a href="#" class="text-dark"><span class="font-weight-semibold">Website :</span>{{ Auth::user()->website ?? 'Not Provided' }}</a></li>
                                                    {{-- @endif --}}

													<li><a href="#" class="text-dark"><span class="font-weight-semibold">Email :</span> {{ Auth::user()->email }}</a></li>

                                                    {{-- @if (Auth::user()->phone) --}}
													<li><a href="#" class="text-dark"><span class="font-weight-semibold">Phone :</span> {{ Auth::user()->phone ?? 'Not Provided' }} </a></li>
                                                    {{-- @endif --}}

												</ul>
												<div class="row profie-img">
													<div class="col-md-12">
														<div class="media-heading">
															<h3 class="card-title mb-3 font-weight-bold">Biography</h3>
														</div>
														<p>
                                                            {{ Auth::user()->biography }}
                                                        </p>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="tab-6">
                                            <form action="{{ route('user.profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="First Name">
                                                        </div>
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email address</label>
                                                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" placeholder="Email">
                                                        </div>
                                                        @error('email')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Phone Number</label>
                                                            <input type="number" name="phone" class="form-control" value="{{ Auth::user()->phone ?? '' }}" placeholder="Number">
                                                        </div>
                                                        @error('number')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    {{-- <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Address</label>
                                                            <input type="text" name="address" class="form-control" placeholder="Home Address">
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Country</label>
                                                            <select name="country" class="form-control border-bottom-0 w-100 select2-show-search" data-placeholder="Select">
                                                                <optgroup label="Categories">

                                                                    <option>--Select--</option>

                                                                    @foreach ($countries as $country)

                                                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>

                                                                    @endforeach

                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                        @error('country')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">About Me</label>
                                                            <textarea rows="5" class="form-control" name="biography" placeholder="Enter About your description">{{ Auth::user()->biography ?? '' }}</textarea>
                                                        </div>
                                                        @error('biography')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="control-group form-group">
                                                            <label class="form-label">Upload Profile Photo</label>
                                                            <div class="input-group file-browser">
                                                                <input class="form-control" id="profile_photo_path" name="profile_photo_path" type="file">
                                                            </div>
                                                        </div>
                                                        @error('profile_photo_path')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
										</div>

                                        <div class="tab-pane" id="tab-10">
                                            <form action="{{ route('user.password.update', Auth::user()->id) }}" method="POST" enctype="multpart/part-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Old Password</label>
                                                            <input type="password" name="current_password" class="form-control" placeholder="Old Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">New Password</label>
                                                            <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Re-Enter New Password</label>
                                                            <input type="password" name="confirm_new_password" class="form-control" placeholder="Re-Enter New Password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
										</div>

										<div class="tab-pane userprof-tab" id="tab-7">
											<div class="table-responsive border-top">
												<table class="table table-bordered table-hover mb-0 text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Item</th>
                                                            <th>Category</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                            <th>Remaining Days</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($paidAds as $ad)
                                                            @php
                                                                $start = \Carbon\Carbon::parse($ad->created_at);
                                                                $total = \Carbon\Carbon::parse($ad->created_at->addDays($ad->getPackage->days));

                                                                $now = \Carbon\Carbon::now();

                                                                if($total > $now){

                                                                    $days = $now->diffInDays($total);

                                                                }elseif($total < $now)
                                                                {
                                                                    $days = 'Expired';
                                                                }
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    {{ $loop->index + 1 }}
                                                                </td>
                                                                <td>
                                                                    <div class="media mt-0 mb-0">
                                                                        <div class="card-aside-img">
                                                                            <a href="#"></a>
                                                                            @foreach ($ad->getAdImages as $image)
                                                                                @if ($loop->first)
                                                                                    <img src="{{ asset('uploads/adImages') }}/{{ $image->ad_images }}" alt="img">
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <div class="card-item-desc ms-4 p-0 mt-2">
                                                                                <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $ad->ad_title }}</h4></a>
                                                                                <a href="#"><i class="fa fa-clock-o me-1"></i> {{ $ad->created_at->translatedFormat('j F Y') }}</a><br>
                                                                                {{-- <a href="#"><i class="fa fa-tag me-1"></i>sale</a> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $ad->getCategory->name }}</td>
                                                                <td class="font-weight-semibold fs-16">{{ $ad->getPackage->package_price}}</td>
                                                                <td>
                                                                    @if ($days == 'Expired')
                                                                        <span class="badge badge-danger">Not Publish</span>
                                                                        <a href="{{ route('renew.ad', $ad->id) }}" class="badge badge-info">Renew</a>
                                                                    @else
                                                                        @if($ad->status == '1')
                                                                            <a href="#" class="badge badge-warning">Published</a>
                                                                        @elseif($ad->status == '0')
                                                                            <a href="#" class="badge badge-danger">Not Publish</a>
                                                                        @else
                                                                            <a href="#" class="badge badge-info"></a>
                                                                        @endif
                                                                    @endif
                                                                    @if ($ad->featured_id == '')
                                                                        <a href="#" class="badge badge-danger">Not Feature</a>
                                                                    @endif

                                                                </td>
                                                                <td>

                                                                    {{ $days; }}

                                                                </td>
                                                                <td>
                                                                    <a class="btn btn-success text-white" href="{{ route('edit.ad', $ad->id) }}" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>

                                                                    <button data-bs-toggle="modal" data-bs-target="#exampleModal{{ $ad->id }}" class="btn btn-danger text-white delete-ad" class="delete-confirm"><i class="fa fa-trash-o"></i></button>
                                                                    <a class="btn btn-primary text-white" target="_blank" href="{{ route('ad.details', $ad->id) }}" data-bs-original-title="View"><i class="fa fa-eye"></i></a>
                                                                    @if ($days == 'Expired')
                                                                        <a class="btn btn-info text-white" href="{{ route('renew.ad', $ad->id) }}" data-bs-original-title="Renew"><i class="fa fa-edit"></i>Renew</a>
                                                                    @endif
                                                                    @if ($ad->featured_id == '')
                                                                        <a href="{{ route('ad.feature', $ad->id) }}" class="btn btn-secondary">Feature Post</a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            @push('all-modals')

                                                            <div class="modal fade" id="exampleModal{{ $ad->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">
                                                                    <div class="modal-header">
                                                                      <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                      Are You Sure To Delete This Post ?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                      <button type="button" class="btn btn-primary">
                                                                        <a style="color: inherit" href="{{ route('delete.ad', $ad->id) }}">Delete</a>
                                                                      </button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            @endpush
                                                        @endforeach
                                                </tbody>
                                                </table>
											</div>
										</div>
										<div class="tab-pane userprof-tab" id="tab-8">
											<div class="table-responsive border-top">
												<table class="table table-bordered table-hover mb-0 text-nowrap">
												<thead>
													<tr>
														<th>ID</th>
														<th>Item</th>
														<th>Category</th>
														<th>Price</th>
														<th>Status</th>
														<th>Remaining Days</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>

                                                    @foreach ($featuredAds as $ad)
                                                        @php
                                                            $start = \Carbon\Carbon::parse($ad->created_at);
                                                            $total = \Carbon\Carbon::parse($ad->created_at->addDays($ad->getPackage->days));

                                                            $now = \Carbon\Carbon::now();

                                                            if($total > $now){

                                                                $days = $now->diffInDays($total);

                                                            }elseif($total < $now)
                                                            {
                                                                $days = 'Expired';
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td>
                                                                {{ $loop->index + 1 }}
                                                            </td>
                                                            <td>
                                                                <div class="media mt-0 mb-0">
                                                                    <div class="card-aside-img">
                                                                        <a href="#"></a>
                                                                        @foreach ($ad->getAdImages as $image)
                                                                            @if ($loop->first)
                                                                                <img src="{{ asset('uploads/adImages') }}/{{ $image->ad_images }}" alt="img">
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="card-item-desc ms-4 p-0 mt-2">
                                                                            <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $ad->ad_title }}</h4></a>
                                                                            <a href="#"><i class="fa fa-clock-o me-1"></i> {{ $ad->created_at->translatedFormat('j F Y') }}</a><br>
                                                                            {{-- <a href="#"><i class="fa fa-tag me-1"></i>sale</a> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $ad->getCategory->name }}</td>
                                                            <td class="font-weight-semibold fs-16">{{ $ad->getPackage->package_price}}</td>
                                                            <td>
                                                                @if ($days == 'Expired')
                                                                    <a href="#" class="badge badge-warning">Expired</a>
                                                                @else
                                                                    @if($ad->status == '1')
                                                                        <a href="#" class="badge badge-warning">Published</a>
                                                                    @elseif($ad->status == '0')
                                                                        <a href="#" class="badge badge-danger">Not Publish</a>
                                                                    @else
                                                                        <a href="#" class="badge badge-danger"></a>
                                                                    @endif
                                                                @endif

                                                            </td>
                                                            <td>

                                                                {{ $days; }}

                                                            </td>
                                                            <td>
                                                                <a class="btn btn-success text-white" href="{{ route('edit.ad', $ad->id) }}" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                                {{-- <a href="{{ route('delete.ad', $ad->id) }}" class="btn btn-danger text-white delete-ad" class="delete-confirm" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fa fa-trash-o"></i></a> --}}
                                                                <a class="btn btn-primary text-white" target="_blank" href="{{ route('ad.details', $ad->id) }}" data-bs-original-title="View"><i class="fa fa-eye"></i></a>
                                                                {{-- <a class="btn btn-primary text-white" href="#" data-bs-original-title="Renew"><i class="fa fa-edit"></i></a> --}}
                                                            </td>
                                                        </tr>
                                                    @endforeach

												</tbody>
											</table>
											</div>
										</div>
										<div class="tab-pane userprof-tab" id="tab-9">
											<div class="table-responsive border-top">
												<table class="table table-bordered table-hover mb-0 text-nowrap">
													<thead>
														<tr>
															<th>ID</th>
															<th>Item</th>
															<th>Category</th>
															<th>Price</th>
															<th>Ad Status</th>
															<th >Remaining Days</th>
															<th >Action</th>
														</tr>
													</thead>
													<tbody>
                                                            @foreach ($publishAds as $ad)
                                                                @php
                                                                    $start = \Carbon\Carbon::parse($ad->created_at);
                                                                    $total = \Carbon\Carbon::parse($ad->created_at->addDays($ad->getPackage->days));

                                                                    $now = \Carbon\Carbon::now();

                                                                    if($total > $now){

                                                                        $days = $now->diffInDays($total);

                                                                    }elseif($total < $now)
                                                                    {
                                                                        $days = 'Expired';
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <td>
                                                                        {{ $loop->index + 1 }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="media mt-0 mb-0">
                                                                            <div class="card-aside-img">
                                                                                <a href="#"></a>
                                                                                @foreach ($ad->getAdImages as $image)
                                                                                    @if ($loop->first)
                                                                                        <img src="{{ asset('uploads/adImages') }}/{{ $image->ad_images }}" alt="img">
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <div class="card-item-desc ms-4 p-0 mt-2">
                                                                                    <a href="#" class="text-dark"><h4 class="font-weight-semibold">{{ $ad->ad_title }}</h4></a>
                                                                                    <a href="#"><i class="fa fa-clock-o me-1"></i> {{ $ad->created_at->translatedFormat('j F Y') }}</a><br>
                                                                                    {{-- <a href="#"><i class="fa fa-tag me-1"></i>sale</a> --}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{ $ad->getCategory->name }}</td>
                                                                    <td class="font-weight-semibold fs-16">{{ $ad->getPackage->package_price}}</td>
                                                                    <td>
                                                                        @if ($days == 'Expired')
                                                                            <a href="#" class="badge badge-danger">Not Publish</a>
                                                                            <a href="{{ route('renew.ad', $ad->id) }}" class="badge badge-info">Renew</a>
                                                                        @else
                                                                            @if($ad->status == '1')
                                                                                <a href="#" class="badge badge-warning">Published</a>
                                                                            @elseif($ad->status == '0')
                                                                                <a href="#" class="badge badge-danger">Not Publish</a>
                                                                            @else
                                                                                <a href="#" class="badge badge-info"></a>
                                                                            @endif
                                                                        @endif

                                                                    </td>
                                                                    <td>

                                                                        {{ $days; }}

                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-success text-white" href="{{ route('edit.ad', $ad->id) }}" data-bs-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                                                        {{-- <a href="{{ route('delete.ad', $ad->id) }}" class="btn btn-danger text-white delete-ad" class="delete-confirm" data-bs-toggle="tooltip" data-bs-original-title="Delete"><i class="fa fa-trash-o"></i></a> --}}
                                                                        <a class="btn btn-primary text-white" target="_blank" href="{{ route('ad.details', $ad->id) }}" data-bs-original-title="View"><i class="fa fa-eye"></i></a>
                                                                        @if ($days == 'Expired')
                                                                            <a class="btn btn-info text-white" href="{{ route('renew.ad', $ad->id) }}" data-bs-original-title="Renew"><i class="fa fa-edit"></i>Renew</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
@push('custom-js')
<script>
    document.getElementById('profile_photo_path').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('profilePhoto').src = src
    }
</script>

@endpush
