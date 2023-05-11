@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Packages
@endsection

@section('package.list')
    active
@endsection

@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Packages</h3>
                <div class="d-flex">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addPackageModal"><i data-feather='plus' class="mr-25"></i>Add Package</a>
                    <div class="dropdown mx-1">
                        <button class="btn btn-primary dropdown-toggle package_bulk hide" type="button" data-toggle="dropdown" aria-expanded="false">
                          Bulk Action
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#" id="packageBulkDelete"><i data-feather='database'></i> Bulk Delete</a>
                        </div>
                      </div>
                </div>
                @push('all-modals')
                    <!-- Modal -->
                    <div class="modal fade" id="addPackageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add new Package</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{route('package.store')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Package for how many days?</label>
                                        <input type="number" name="days" class="form-control" value="{{ old('days') }}" placeholder="Enter days in number">
                                        @error('days')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Package Price</label>
                                        <input type="number" name="package_price" class="form-control" value="{{ old('package_price') }}" placeholder="Enter package price">
                                        @error('package_price')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                @endpush
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover datatable text-center">
                    <thead>
                        <tr>
                            <th width="10">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input all_checked" name="" id="customCheck">
                                    <label class="custom-control-label" for="customCheck"></label>
                                </div>
                            </th>
                             <th>Action</th>
                             <th>Days</th>
                             <th>Package Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($packages as $package)
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input all_checked" name="" id="customCheck">
                                    <label class="custom-control-label" for="customCheck"></label>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button type="button" class="dropdown-item"   data-toggle="modal" data-target="#editPackageModal-{{ $package->id }}">
                                            <i data-feather="edit" class="mr-50"></i>
                                            <span>Edit</span>
                                        </button>
                                        <button type="button" class="dropdown-item"   data-toggle="modal" data-target="#deleteModal-{{ $package->id }}">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>Delete</span>
                                        </button>
                                        {{-- <form action="{{route('package.delete', $package->id)}}" action="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form> --}}
                                    </div>
                                </div>
                            </td>
                            <td>{{$package->days}}</td>
                            <td>{{$package->package_price}}</td>
                        </tr>
                        @push('all-modals')
                            <!-- Modal -->
                            <div class="modal fade" id="editPackageModal-{{ $package->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit Package</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{route('package.update',$package->id)}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Package for how many days?</label>
                                                <input type="number" name="days" class="form-control" value="{{ $package->days }}" placeholder="Enter days in number">
                                                @error('days')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Package Price</label>
                                                <input type="number" name="package_price" class="form-control" value="{{ $package->package_price }}" placeholder="Enter package price" step="any">
                                                @error('package_price')
                                                    <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal-{{ $package->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Package</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure To Delete This Package?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <form action="{{route('package.delete', $package->id)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                {{-- @method('delete') --}}
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endpush
                        @empty
                        <tr>Nothing Found</tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
