@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Contacts
@endsection

@section('contact')
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
                    <h4 class="card-title">Contact Information</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('contact.update', $contact->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="title">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $contact->title }}" id="title" class="form-control" placeholder="Enter Title"/>
                                    @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="sub_title" value="{{ $contact->sub_title }}" id="sub_title" class="form-control" placeholder="Enter Sub Title"/>
                                    @error('sub_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ $contact->phone }}" id="phone" class="form-control" placeholder="Enter Phone"/>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="working_hour">Working Hour <span class="text-danger">*</span></label>
                                    <input type="text" name="working_hour" value="{{ $contact->working_hour }}" id="working_hour" class="form-control" placeholder="Enter Working Hour"/>
                                    @error('working_hour')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="text" name="email" value="{{ $contact->email }}" id="email" class="form-control" placeholder="Enter Email"/>
                                    @error('email')
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
