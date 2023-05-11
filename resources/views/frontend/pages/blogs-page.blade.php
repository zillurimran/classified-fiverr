@extends('frontend.layout.main')

@section('blogs-page-menu', 'active')

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">All Blogs</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Blogs</li>
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
                <!--Add lists-->
                <div class="col-xl-8 col-lg-8 col-md-12">

                    <div class="row" id="blogDiv">

                        @include('frontend.include.blog')

                    </div>
                    <div>
                        <div id="pagination">
                            @if (!$blogs)
                                There is no active Blog !
                            @endif
                            {!! $blogs->links() !!}
                        </div>
                        <div id="notPaginate"></div>

                    </div>

                    {{-- <div class="center-block text-center">
                        <ul class="pagination mb-lg-0 mb-5">
                            <li class="page-item page-prev disabled">
                                <a class="page-link" href="#" tabindex="-1">Prev</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item page-next">
                                <a class="page-link" href="#">Next</a>
                            </li>

                        </ul>
                    </div> --}}
                </div>
                <!--/Add lists-->

                <!--Rightside Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" id="searchBlog" class="form-control br-ts-7 br-bs-7" placeholder="Search">
                                <div class="input-group-text border-0 bg-transparent p-0 ">
                                    <button type="button" id="searchBlogSubmitBtn" class="btn btn-primary br-te-7 br-be-7">
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
                        <div class="card-body p-0">
                            <div class="list-catergory">
                                <div class="item-list">
                                    <ul class="list-group mb-0">
                                        @foreach ($blogCategories as $category)
                                            <li class="list-group-item">
                                                <a href="#!" class="categoryWiseBlog" data-id="{{ $category->id }}" class="text-dark">
                                                    <i class="fa fa-building bg-primary text-primary"></i>
                                                    {{ $category->name }}
                                                    <span class="badgetext badge rounded-pill bg-secondary mb-0">{{ count(\App\Models\Blogs::where('category_id', $category->id)->get()) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
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
                                    @foreach ($tags as $tag)

                                        <li><a href="#" class="tagWiseSearch" data-id="{{ $tag->id }}">{{ $tag->name }}</a></li>

                                    @endforeach
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
                                                <a href="" class="authorWiseBlog" data-id="{{ $user->id }}" class="time-title p-0 leading-normal mt-2">{{ $user->name }} <i class="si si-check text-success fs-12 ms-1" data-bs-toggle="tooltip"data-bs-placement="top" title="" data-bs-original-title="verified"></i></a>
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
    <!--Add listing-->
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
@section('custom-js')

@endsection
