@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Stripe Key
@endsection

@section('stripeKey')
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
                <h3 class="card-title">Stripe Api Key</h3>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover datatable text-center">
                    <thead>
                        <tr>
                             <th>Secret Key</th>
                             <th>Public Key</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>
                                    {{ Illuminate\Support\Str::limit($stripeKey->key, 15) }}
                                </td>
                                <td>
                                    {{ Illuminate\Support\Str::limit($stripeKey->secret, 15) }}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu">

                                            <a class="dropdown-item"  data-toggle="modal" data-target="#editModal" title="Delete">
                                                <i data-feather='edit' class="mr-50"></i>
                                                <span>Edit</span>
                                            </a>

                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @push('all-modals')

                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Edit Stripe Api</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="{{ route('changeStripe', $stripeKey->id) }}" method="post">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text" name="key" class="form-control" value="{{ $stripeKey->key }}" placeholder="{{ Illuminate\Support\Str::limit($stripeKey->key, 10) }}">
                                                        @error('key')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="secret">Secret</label>
                                                        <input type="text" name="secret" class="form-control" value="{{ $stripeKey->secret }}" placeholder="{{ Illuminate\Support\Str::limit($stripeKey->secret, 10) }}">
                                                        @error('secret')
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
