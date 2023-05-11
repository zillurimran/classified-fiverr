@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Testimonials
@endsection

@section('testimonials')
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
            <li class="breadcrumb-item">Testimonials</li>
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
                    <button style="margin: 21px 21px 0 0;" class="btn btn-gradient-primary float-right"><a style="color: #f1f1f1" href="{{ route('testimonials.create') }}">Create Testimonials</a></button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data_table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Star</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <span>{{ $testimonial->name }}</span>
                                </td>
                                <td>
                                    <span>{{ \Illuminate\Support\Str::limit($testimonial->description, 20) }}</span>
                                </td>
                                <td>
                                    <span>{{ $testimonial->star }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="check-circle"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item" href="{{ route('testimonials.show', $testimonial->id) }}">
                                                <i data-feather='eye' class="mr-50"></i>
                                                <span>Show</span>
                                            </a> --}}
                                            <a class="dropdown-item" href="{{ route('testimonials.edit', $testimonial->id) }}">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $testimonial->id }}" title="Delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all-modals')
                                <!-- Delete Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Testimonial</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure To Delete Entire Testimonial?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endpush
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
