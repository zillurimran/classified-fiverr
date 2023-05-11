@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Testimonials Update
@endsection

@section('testimonials')
    active
@endsection


{{-- Breadcrumb --}}
@section('breadcrumb')
     <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item">Testimonials</li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </div>
@endsection

{{-- Main Content --}}
@section('content')
<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <label class="form-label">Name </label>
                        <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Give Star </label>
                        <input type="text" name="star" class="form-control" placeholder="Example: 5" value="{{ $testimonial->star }}">
                        @error('star')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label class="form-label">Description <span class="text-danger"> *</span> </label>
                        <textarea class="form-control" rows="5" name="description" placeholder="Write Your Review Here !!">{{ $testimonial->description }}
                        </textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <div class="row">
                            <div class="col-md-10">
                                <label class="form-label">Image </label>
                                <input type="file" id="file-upload" name="image" class="form-control">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <img id="item_output" src="{{ asset('uploads/testimonials') }}/{{ $testimonial->image }}" style="height: 100px; width: 100px;" alt="">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection

@push('page-js')
<script>
    document.getElementById('file-upload').onchange = function() {
        var src = URL.createObjectURL(this.files[0])
        document.getElementById('item_output').src = src
    }
</script>
@endpush


