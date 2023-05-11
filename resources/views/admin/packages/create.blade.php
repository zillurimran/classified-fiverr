@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Packages
@endsection

@section('package.create')
    active
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Create Package</h3>
                @if(session('success'))
                    <div class="aler alert-success">{{$message}}</div>
                @endif
                @if(session('warning'))
                    <div class="aler alert-danger">{{$message}}</div>
                @endif
            </div> --}}
            <div class="card-body">
                <form action="{{route('package.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Package for how many days?</label>
                        <input type="number" name="days" class="form-control" value="{{ old('days') }}" placeholder="Enter days in number">
                        @error('days')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Package Price</label>
                        <input type="number" name="package_price" class="form-control" value="{{ old('package_price') }}" placeholder="Enter package price" step="any">
                        @error('package_price')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection