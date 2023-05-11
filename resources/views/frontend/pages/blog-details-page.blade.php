@extends('frontend.layout.main')

@section('blogs-page-menu', 'active')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">Blog-Details</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Blog-Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Add listing-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="item7-card-img">

                                @if ($singleBlog->video_link && $singleBlog->image == '')
                                        <iframe width="720" height="514" src="https://www.youtube.com/embed/{{ $singleBlog->video_link }}" title="#" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    @elseif($singleBlog->image && $singleBlog->video_link == '')
                                        <img src="{{ asset('uploads/blogs') }}/{{ $singleBlog->image }}" alt="img" class="w-100">
                                    @else
                                @endif

                                <div class="item7-card-text">
                                    <span class="badge badge-info">{{ App\Models\BlogCategory::where('id', $singleBlog->id)->first()->name ?? "" }}</span>
                                </div>
                            </div>
                            <div class="item7-card-desc d-flex mb-2 mt-3">
                                <a href="#"><i class="fa fa-calendar-o text-muted me-2"></i>{{ $singleBlog->created_at->Format('d-M-Y') }}</a>
                                <a href="#"><i class="fa fa-user text-muted me-2"></i>{{ \App\Models\User::where('id', $singleBlog->user_id)->first()->name ?? '' }}</a>
                                <div class="ms-auto">
                                    <a href="#"><i class="fa fa-comment-o text-muted me-2"></i>
                                        {{ count(\App\Models\BlogComment::where('blog_id', $singleBlog->id)->get()) }}
                                        Comments
                                    </a>
                                </div>
                            </div>
                            <a href="#" class="text-dark"><h2 class="font-weight-semibold">{{ $singleBlog->title }}</h2></a>
                            <p>{!! $singleBlog->description !!}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comments</h3>
                        </div>
                        <div class="card-body p-0">
                            @foreach ($blogComments as $comment)
                                <div class="media mt-0 p-5">
                                    <div class="d-flex me-3">
                                        <a href="#"><img class="media-object brround" alt="64x64" src="{{ asset('frontend/assets/images/faces/male/1.jpg') }}"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mt-0 mb-1 font-weight-semibold">
                                            {{ $comment->name }}
                                            <span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                            {{-- <span class="fs-14 ms-2"> 4.5 <i class="fa fa-star text-yellow"></i></span> --}}
                                        </h5>
                                        <small class="text-muted">
                                            <i class="fa fa-calendar"></i> {{ $comment->created_at->format('d-m-Y') }}
                                            {{-- <i class=" ms-3 fa fa-clock-o"></i> 13.00
                                            <i class=" ms-3 fa fa-map-marker"></i> Brezil --}}
                                        </small>
                                        <p class="font-13  mb-2 mt-2">
                                            {{ $comment->comment }}
                                        </p>
                                        <a href="#" class="me-2"><span class="badge bg-primary">Helpful</span></a>
                                        <a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#Comment{{ $comment->id }}"><span class="">Reply</span></a>
                                        @push('all-modals')
                                            <div class="modal fade" id="Comment{{ $comment->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{ route('reply.comment', $singleBlog->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleCommentLongTitle">Leave a Reply</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" value="{{ $comment->id }}" name="comment_id">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="commet-name" name="name" placeholder="Your Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="email" class="form-control" id="commet-email" name="email" placeholder="Email Address">
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <textarea class="form-control" name="reply" rows="6" placeholder="Message"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-success">Send</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endpush
                                        {{-- <a href="" class="me-2" data-bs-toggle="modal" data-bs-target="#report"><span class="">Report</span></a> --}}
                                        @php
                                            $replyComments = App\Models\ReplyComment::where('comment_id', $comment->id)->get();
                                        @endphp
                                        @foreach ($replyComments as $reply)
                                            <div class="media mt-5">
                                                <div class="d-flex me-3">
                                                    <a href="#"> <img class="media-object brround" alt="64x64" src="{{ asset('frontend/assets/images/faces/female/2.jpg') }}"> </a>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-1 font-weight-semibold">{{ $reply->name }} <span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h5>
                                                    <small class="text-muted">
                                                        <i class="fa fa-calendar"></i> {{ $reply->created_at->format('d-m-Y') }}
                                                    </small>
                                                    <p class="font-13  mb-2 mt-2">
                                                        {{ $reply->reply }}
                                                    </p>
                                                    {{-- <a href="" data-bs-toggle="modal" data-bs-target="#Comment"><span class="badge badge-default">Comment</span></a> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="media p-5 border-top mt-0">
                                <div class="d-flex me-3">
                                    <a href="#"> <img class="media-object brround" alt="64x64" src="{{ asset('frontend/assets/images/faces/male/3.jpg') }}"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1 font-weight-semibold">{{ \App\Models\User::where('id', $blogComment->user_id)->name }}
                                    <span class="fs-14 ms-0" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
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
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h3 class="card-title">Write Your Comments</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('write.comment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $singleBlog->id }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address *" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="6" placeholder="Write Your Comment *" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Rightside Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    {{-- <div class="card">
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
                    </div> --}}
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-catergory">
                                <div class="item-list">
                                    <ul class="list-group mb-0">
                                        @foreach ($blogCategories as $category)
                                            <li class="list-group-item">
                                                <a href="{{route('category.blog', $category->id)}}" class="text-dark">
                                                    <i class="fa fa-building bg-primary text-primary"></i>
                                                    {{ $category->name }}
                                                    <span class="badgetext badge rounded-pill bg-secondary mb-0">{{ count(\App\Models\Blogs::where('category_id', $category->id)->get()) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                        {{-- <li class="list-group-item">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-bed bg-success text-success"></i> Hostel & Travels
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">63</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-heartbeat bg-info text-info"></i> Health & Fitness
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">25</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-cutlery bg-warning text-warning"></i> Restaurant
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">74</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-laptop bg-danger text-danger"></i> Computer
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">18</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-mobile bg-blue text-blue"></i> Mobile
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">32</span>
                                            </a>
                                        </li>
                                        <li class="list-group-item border-bottom-0">
                                            <a href="#" class="text-dark">
                                                <i class="fa fa-pencil-square  bg-secondary text-pink"></i> Education
                                                <span class="badgetext badge rounded-pill bg-secondary mb-0">08</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Popular Tags</h3>
                        </div>
                        <div class="card-body">
                            <div class="product-tags clearfix">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($singleBlog->tags as $tag)
                                    <li><a href="{{route('tag.blogs', $tag->id)}}">{{ $tag->name }}</a></li>

                                    @endforeach
                                    {{-- <li><a href="#">Real Estate</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Health & Beauty</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">Jobs</a></li>
                                    <li><a href="#">Automobiles</a></li>
                                    <li><a href="#">Computer</a></li>
                                    <li><a href="#" class="mb-0">Electronics</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Blog Authors</h3>
                        </div>
                        <div class="card-body p-0">
                            <ul class="vertical-scroll">
                                @foreach ($users as $user)
                                    <li class="item2">
                                        <div class="footerimg d-flex mt-0 mb-0">
                                            <div class="d-flex footerimg-l mb-0">
                                                <img src="{{ asset('uploads/profile') }}/{{ $user->profile_photo_path }}" alt="image" class="avatar brround  me-2">
                                                <a href="{{route('author.blogs',$user->id)}}" class="time-title p-0 leading-normal mt-2" data-id="{{$user->id}}">{{ $user->name }} <i class="si si-check text-success fs-12 ms-1" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="verified"></i></a>
                                            </div>
                                            <div class="mt-2 footerimg-r ms-auto">
                                                {{-- <a href="#" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="Articles"><span class="text-muted me-2"><i class="fa fa-comment-o"></i> {{ count(\App\Models\BlogComment::where('user_id', $user->id)->get()) }}</span></a> --}}
                                                {{-- <a href="#" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="Likes"><span class="text-muted"><i class="fa fa-thumbs-o-up"></i> 36</span></a> --}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <!--/Rightside Content-->
            </div>
        </div>
    </section>
    <!--/Add listing-->

    @push('all-modals')
        <!-- Message Modal -->


        <!-- Report Modal -->
        <div class="modal fade" id="report" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="examplereportLongTitle">Report Abuse</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="report-name" placeholder="Enter url">
                        </div>
                        <div class="form-group">
                            <select name="country" id="select-countries" class="form-control form-select">
                                <option value="1" selected>Categories</option>
                                <option value="2">Spam</option>
                                <option value="3">Identity Theft</option>
                                <option value="4">Online Shopping Fraud</option>
                                <option value="5">Service Providers</option>
                                <option value="6">Phishing</option>
                                <option value="7">Spyware</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="report-email" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-0">
                            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {

            // Search blog
            $("body").on('input', '#searchBlog', function (e) {
                let search_value = $('#searchBlog').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('blogSearch') }}",
                    type: "post",
                    data: {
                        search_value: search_value
                    },
                    success: function (response){
                        $('#blogDiv').html(response.searchData);
                        $('#pagination').hide();
                        $('#notPaginate').text('Nothing To Show');
                    }
                });
            });

            //  category Wise Blog Search
            $('.categoryWiseBlog').on('click', function(){
                let id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('blogSearchByCategory') }}",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function (response){
                        $('#blogDiv').html(response.searchData);
                        $('#pagination').hide();
                        $('#notPaginate').text('Nothing To Show');
                    }
                });
            });

            // Author Wise Blog Search
            $('.authorWiseBlog').on('click', function(e){
                e.preventDefault();
                
                let id = $(this).attr('data-id');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('blogSearchByAuthor') }}",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function (response){
                        $('#blogDiv').html(response.searchData);
                        $('#pagination').hide();
                        $('#notPaginate').text('Nothing To Show');
                    }
                });
            });

            // Author Wise Blog Search
            $('.tagWiseSearch').on('click', function(){
                let id = $(this).attr('data-id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('blogSearchByTag') }}",
                    type: "post",
                    data: {
                        id: id
                    },
                    success: function (response){
                        $('#blogDiv').html(response.searchData);
                        $('#pagination').hide();
                        $('#notPaginate').text('Nothing To Show');
                    }
                });
            });

        });
    </script>
    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
