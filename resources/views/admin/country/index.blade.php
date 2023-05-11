@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Country
@endsection

@section('country.list')
    active
@endsection

@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush

@section('content')
<div class="card">
    <div class="card-header border-bottom">
        <h3 class="card-title">All Countries</h3>
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addCountryModal">Add Country</a>
    </div>
    @push('all-modals')
    <!-- Modal -->
    <div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Country</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('country.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Country Name</label>
                        <input type="text" name="country_name" class="form-control" value="{{ old('country_name') }}" placeholder="Enter Country Name">
                        @error('country_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="customFile">Background image</label>
                        <div class="custom-file">
                            <input type="file" name="bg_image" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose the file</label>
                        </div>
                        @error('bg_image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    @endpush
    <div class="card-body table-reponsive">
        <table class="table table-bordered table-hover datatable text-center">
            <thead>
                <tr>
                    <th width="10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input all_ads" name="" id="countryBulkCheck">
                            <label class="custom-control-label" for="countryBulkCheck"></label>
                        </div>
                    </th>
                    <th>Action</th>
                    <th>Country Name</th>
                    <th>Background Image</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($countries as $country)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input category_check" name="" id="customCheck{{$country->id}}" data-id="{{$country->id}}">
                                <label class="custom-control-label" for="customCheck{{$country->id}}"></label>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{route('country.delete', $country->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $country->country_name }}</td>
                        <td>
                            <img src="{{asset('uploads/locations')}}/{{$country->bg_image}}" alt="" height="100">
                        </td>
                    </tr>
                        @empty
                        <tr>Nothing Found</tr>
                @endforelse
            </tbody>
        </table>
    </div>
 </div>
@endsection