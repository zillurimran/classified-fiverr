@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Featured Packages
@endsection

@section('featured.package.create')
    active
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header">
                <h3 class="card-title">Create Featured Package</h3>
                @if(session('success'))
                    <div class="aler alert-success">{{$message}}</div>
                @endif
                @if(session('warning'))
                    <div class="aler alert-danger">{{$message}}</div>
                @endif
            </div> --}}
            <div class="card-body">
                <form action="{{route('featured.package.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Featuring days?</label>
                        <input type="number" name="featured_days" class="form-control" value="{{ old('feature_days') }}" placeholder="Enter days in number">
                        @error('featured_days')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Featuring Price</label>
                        <input type="number" name="featured_price" class="form-control" value="{{ old('feature_price') }}" placeholder="Enter package price" step="any">
                        @error('featured_price')
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