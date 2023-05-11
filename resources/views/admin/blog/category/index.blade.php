@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Blog Category
@endsection

@section('blogCategory')
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
                <h3 class="card-title">All Tag</h3>
                <div class="d-flex">
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addPackageModal"><i data-feather='plus' class="mr-25"></i>Create Blog Category</a>
                    {{-- <div class="dropdown mx-1">
                        <button class="btn btn-primary dropdown-toggle package_bulk hide" type="button" data-toggle="dropdown" aria-expanded="false">
                          Bulk Action
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#" id="packageBulkDelete"><i data-feather='database'></i> Bulk Delete</a>
                        </div>
                      </div> --}}
                </div>
                @push('all-modals')
                    <!-- Modal -->
                    <div class="modal fade" id="addPackageModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{route('blogCategory.store')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
                                        @error('name')
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
                             <th>ID</th>
                             <th>Name</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"  data-toggle="modal" data-target="#editModal{{ $category->id }}" title="Delete">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter{{ $category->id }}" title="Delete">
                                                <i data-feather="trash" class="mr-50"></i>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all-modals')
                            <!-- Delete Modal -->
                            <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form action="{{route('blogCategory.update', $category->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Tag Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" placeholder="Name">
                                                    @error('name')
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
                                <div class="modal fade" id="exampleModalCenter{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Categroy</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure To Delete This Category?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <form action="{{ route('blogCategory.destroy', $category->id) }}" method="POST" enctype="multipart/form-data">
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
@endsection
