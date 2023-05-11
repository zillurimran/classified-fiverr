@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | About Banner
@endsection

@section('about')
    active
@endsection
@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush
@section('content')
<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Banner Details</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('about.details.update', $abouts->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $abouts->title }}" id="title" class="form-control" placeholder="Enter title"/>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="sub_title" value="{{ $abouts->sub_title }}" id="sub_title" class="form-control" placeholder="Enter Sub Titile"/>
                                    @error('sub_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="5" name="description" placeholder="Description">{{ $abouts->description }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-js')

@endpush
