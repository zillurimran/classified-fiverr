@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Blogs
@endsection

@section('blogs')
    active
@endsection

@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush


{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Blog</li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-header">
                        <h4 class="card-title">List</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <button style="margin: 21px 21px 0 0;" class="btn btn-gradient-primary float-right"><a style="color: #f1f1f1" href="{{ route('blogs.edit', $singleBlog->id) }}">Edit</a></button>
                </div>
            </div>
            <div class="card-body">
                    <div style='margin-left: auto;margin-right: auto;display: block;'>
                        @if ($singleBlog->image)
                            <img src="{{ asset('uploads/blogs') }}/{{ $singleBlog->image }}" alt="" style="height: 200px;width: 400px">
                        @elseif($singleBlog->video_link)
                            <iframe width="370" height="225" src="https://www.youtube.com/embed/{{ $singleBlog->video_link }}" class="w-100" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        @endif
                    </div>

                <h3 class="mt-3">{{ $singleBlog->title }}</h3>
                <h6>{{ $singleBlog->sub_title }}</h6>
                <p>
                    {!! $singleBlog->description !!}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
