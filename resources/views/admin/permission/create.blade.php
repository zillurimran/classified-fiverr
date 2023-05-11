@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Permission Index
@endsection

@section('permission')
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
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Permission</li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</div>

<div class="row" id="basic-table">
    <div class="col-md-12 col-12 m-auto">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.permission') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-2">
                        <label class="form-label">Name <span class="text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
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


