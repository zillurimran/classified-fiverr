@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Category
@endsection

@section('categories')
    active
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Category</h3>
                @if(session('success'))
                    <div class="aler alert-success">{{$message}}</div>
                @endif
                @if(session('warning'))
                    <div class="aler alert-danger">{{$message}}</div>
                @endif
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Category Name">
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="customFile">Category icon</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose the file</label>
                        </div>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="customFile">Category background image</label>
                        <div class="custom-file">
                            <input type="file" name="bg_image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose the file</label>
                        </div>
                        @error('bg_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection