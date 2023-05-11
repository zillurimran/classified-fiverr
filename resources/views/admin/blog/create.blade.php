@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Blogs
@endsection

@section('blogs')
    active
@endsection


{{-- Main Content --}}
@section('content')

<h2 class="content-header-title mb-0">Admin Dashboard</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="breadcrumb-item">Blog</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</div>

<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Category Name <span class="text-danger"> *</span></label>
                        <select name="category_id" class="form-control">
                            <option selected disabled>--Select One--</option>
                            @foreach ($blogCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Title <span class="text-danger"> *</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Tag <span class="text-danger"> *</span></label>
                        <select name="tag[]" id="tag" class="form-control select-tag" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Sub Title <span class="text-danger"> *</span></label>
                        <input type="text" name="sub_title" class="form-control" value="{{ old('sub_title') }}">
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Media <span class="text-danger"> *</span></label>
                        <select name="" class="form-control" id="bannerMediaSelect" required>
                            <option value="bannerImageField">Image</option>
                            <option value="bannerVideoField">Video</option>
                        </select>
                    </div>

                    <div class="banner-media-fields" id="bannerImageField">
                        <div class="form-group">
                            <label>Banner Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input banner-media-input" id="banner-image-input">
                                  <label class="custom-file-label" for="banner-image-input">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-media-fields" id="bannerVideoField" style="display: none">
                        <div class="form-group">
                            <label>Banner Video</label>
                            <textarea class="form-control banner-media-input" rows="5" name="video_link" placeholder="paste your youtube iframe code"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Long Description <span class="text-danger"> *</span></label>
                        <input type="hidden" name="description" id="x" class="form-control">
                        <trix-editor input="x" style="min-height: 12rem !important"></trix-editor>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@push('page-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-tag').select2();
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bannerMediaSelect').on("change", function(){
            const currentSelectedId = $(this).val()
            $(".banner-media-fields").slideUp()
            $(".banner-media-fields").find('.banner-media-input').removeAttr('required')
            $(`#${currentSelectedId}`).slideDown()
            $(`#${currentSelectedId}`).find('.banner-media-input').attr('required','required')
        })
    });
</script>
@endpush


