@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Ads
@endsection

@section('ad.list')
    active
@endsection

@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush

@section('content')
<div class="card">
    <div class="card-header border-bottom">
        <h3 class="card-title">All Ads</h3>
    </div>
    <div class="card-body table-reponsive">
        <table class="table table-bordered table-hover datatable text-center">
            <thead>
                <tr>
                    <th width="10">
                        {{-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input all_ads" name="" id="adsBulkCheck">
                            <label class="custom-control-label" for="adsBulkCheck"></label>
                        </div> --}}
                        Sl.
                    </th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>Expiry Date</th>
                    <th>Ad Title</th>
                    <th>Category</th>
                    <th>Package</th>
                    <th>Posted By</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ads as $ad)
                    <tr>
                        <td>
                            {{-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input category_check" name="" id="customCheck{{$ad->id}}" data-id="{{$ad->id}}">
                                <label class="custom-control-label" for="customCheck{{$ad->id}}"></label>
                            </div> --}}
                            {{$loop->iteration}}
                        </td>
                        <td class="d-flex">
                            <div class="dropdown mr-1">
                                <button type="button" class="btn btn-icon btn-outline-secondary waves-effect dropdown-toggle hide-arrow" data-toggle="dropdown" data-boundary="viewport">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button type="button" class="dropdown-item"  data-toggle="modal" data-target="#adDeleteModal-{{ $ad->id }}">
                                        <i data-feather="trash" class="mr-50"></i>
                                        <span>Delete</span>
                                    </button>
                                </div>
                            </div>
                            <div>
                                   <a href="{{route('ad.details', $ad->id)}}" class="btn btn-primary" title="Preview" target="_blank"> <i data-feather='eye'></i></a>

                            </div>
                        </td>
                        <td><a href="" data-toggle="modal" data-target="#seeAds-{{$ad->id}}">See details</a></td>
                        {{-- @php
                            $start = \Carbon\Carbon::parse($ad->created_at);
                            $total = \Carbon\Carbon::parse($ad->created_at->addDays($ad->getPackage->days));

                            $now = \Carbon\Carbon::now();

                            if($total > $now){

                                $days = $now->diffInDays($total);

                            }elseif($total < $now)
                            {
                                $days = 'Expired';
                            }
                         @endphp --}}
                        <td>
                            {{-- @if($days !== 'Expired')
                            {{$days > 1 ? $days.' days' : $days.' day'}}
                            @else
                            {{$days}}
                            @endif --}}
                            {{$ad->expiry_date}}
                        </td>
                        <td>{{ $ad->ad_title }}</td>
                        <td>{{$ad->getCategory->name}}</td>
                        <td>{{$ad->getPackage->days.' days - '.$ad->getPackage->package_price.'$'}}</td>
                        <td>{{$ad->getUser->name}}</td>
                    </tr>
                    @push('all-modals')
                                <div class="modal fade" id="seeAds-{{$ad->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">See details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <div class="row">
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title ">Ad Posted by : &nbsp;</h5><p  class="badge badge-primary">{{$ad->getUser->name}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Category: &nbsp;</h5><p class="badge badge-primary">{{$ad->getCategory->name}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Package: &nbsp;</h5><p class="badge badge-primary">{{$ad->getPackage->days.' days/ '.$ad->getPackage->package_price.'$'}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Country: &nbsp;</h5><p class="badge badge-primary">{{$ad->getCountry->country_name}}</p>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Phone: &nbsp;</h5><p class="badge badge-primary">{{$ad->phone}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Ad Expired on: &nbsp;</h5><p class="badge badge-primary">
                                                                {{-- @if($days !== 'Expired')
                                                                {{$days > 1 ? $days.' days' : $days.' day'}}
                                                                @else
                                                                {{$days}}
                                                                @endif</p> --}}
                                                                {{\Carbon\Carbon::parse($ad->expiry_date)->diffForHumans()}}</p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Property Id: &nbsp;</h5><p class="badge badge-primary">{{$ad->property_id}}</p>
                                                        </div>
                                                        @if($ad->getFeaturedPackage)
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Featured For: &nbsp;</h5><p class="badge badge-primary">{{$ad->getFeaturedPackage->featured_days." days"}}</p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-between">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title">Title: &nbsp;</h5><p>{{$ad->ad_title}}</p>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        @foreach($ad->getAdImages as $image)
                                                            <img src="{{asset('uploads/adImages')}}/{{$image->ad_images}}" alt="" width="100" height="100">
                                                        @endforeach
                                                    </div>

                                                    <div class="col-12 mt-2">
                                                            <h5>Short Description: &nbsp;</h5><p>{{$ad->short_desc}}</p>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <h5>Long Description: &nbsp;</h5><p>{!!$ad->long_desc!!}</p>
                                                    </div>
                                                    
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="adDeleteModal-{{ $ad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ad</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure To Delete This Ad?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <form action="{{route('ad.delete', $ad->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
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