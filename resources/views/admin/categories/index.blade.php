@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Category
@endsection

@section('categories.list')
    active
@endsection
@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush
@section('content')
 <div class="card">
    <div class="card-header border-bottom">
        <h3 class="card-title">All Categories</h3>
        <div class="d-flex">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal"><i data-feather='plus' class="mr-25"></i>Add Category</a>
            <div class="dropdown mx-1">
                <button class="btn btn-primary dropdown-toggle category_bulk hide" type="button" data-toggle="dropdown" aria-expanded="false">
                  Bulk Action
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" id="bulkCategoryDelete"><i data-feather='database'></i> Bulk Delete</a>
                </div>
              </div>
        </div>
        @push('all-modals')
            <!-- Modal -->
            <div class="modal fade" id="addCategoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Enter Category Name">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customFile">Category image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose the file</label>
                            </div>
                            @error('image')
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
    </div>
    <div class="card-body table-reponsive">
        <table class="table table-bordered table-hover datatable text-center">
            <thead>
                <tr>
                    <th width="10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input all_categories" name="" id="categoryBulkCheck">
                            <label class="custom-control-label" for="categoryBulkCheck"></label>
                        </div>
                    </th>
                    <th>Action</th>
                    <th>Category Name</th>
                    <th>Category Icon</th>
                    <th>Category Background Image</th>
                    <th>Created_by</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input category_check" name="" id="customCheck{{$category->id}}" data-id="{{$category->id}}">
                                <label class="custom-control-label" for="customCheck{{$category->id}}"></label>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item"   data-toggle="modal" data-target="#editCategoryModal-{{ $category->id }}">
                                        <i data-feather="edit" class="mr-50"></i>
                                        <span>Edit</span>
                                    </button>
                                    <button type="button" class="dropdown-item"   data-toggle="modal" data-target="#deleteModal-{{ $category->id }}">
                                        <i data-feather="edit" class="mr-50"></i>
                                        <span>Delete</span>
                                    </button>
                                    {{-- <form action="{{route('categories.destroy', $category->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i data-feather="trash" class="mr-50"></i>
                                            <span>Delete</span>
                                        </button>
                                    </form> --}}
                                </div>
                            </div>
                        </td>
                        <td>{{$category->name}}</td>
                        <td>
                            <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="" width="60" >
                        </td>
                        <td>
                            <img src="{{asset('uploads/categories')}}/{{$category->bg_image}}" alt="" width="60" >
                        </td>
                        <td>{{$category->created_by}}</td>
                    </tr>
                    @push('all-modals')
                        <div class="modal fade" id="editCategoryModal-{{$category->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $category->name ?? old('name') }}" placeholder="Enter Category Name">
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
                                                <p>Existing Image:</p>
                                                <img src="{{asset('uploads/categories')}}/{{$category->image}}" alt="" width="150">
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
                                            <div class="form-group">
                                                <p>Existing Image:</p>
                                                <img src="{{asset('uploads/categories')}}/{{$category->bg_image}}" alt="" width="150">
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure To Delete This Category?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <form action="{{route('categories.destroy', $category->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
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
@endsection

@push('page-js')
<script>
    $(document).ready(function(){
        $('#categoryBulkCheck').on('click', function(){
            if(this.checked){
                $('.category_bulk').removeClass('hide');
                $('.category_check').each(function(){
                   this.checked = true;
                })
            }else{
                $('.category_bulk').addClass('hide');
                $('.category_check').each(function(){
                    this.checked = false;
                })
            }
        })

        $('.category_check').on('click', function(){
            if($('.category_check:checked').length == 0){
                $('.category_bulk').addClass('hide');
            }
            if(this.checked){
                $('.category_bulk').removeClass('hide');
            }
            if($('.category_check:checked').length == $('.category_check').length){
                $('#categoryBulkCheck').prop('checked', true);
            }else{
                $('#categoryBulkCheck').prop('checked', false);
            }
        })

        $('#bulkCategoryDelete').on('click', function(e){
            e.preventDefault();
            var ids = [];
            $('.category_check:checked').each(function(){
                ids.push($(this).attr('data-id'))
            })

            var ids = ids.join(',');
           $.ajax({
             url:"{{route('bulkCategory.delete')}}",
             method:'get',
             data:{
                ids:ids,
             },success:function(res){
                console.log(res.data)
             }
           })
        })
    })
</script>
@endpush
