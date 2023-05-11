@extends('frontend.layout.main')

@section('home-page-menu', 'active')

@section('main')
    <a href="{{ route('postAd', $id) }}">Post Ad</a>

    <div class="row">
        <div class="com-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="item2-gl">
                        <div class="item2-gl-nav d-flex">
                            <ul class="nav item2-gl-menu ms-auto">
                                <li class=""><a href="#tab-11" class="active show" data-bs-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-11">

                                {{-- @if ($ads)
                                    @foreach ($ads as $ad)
                                        <div class="card mb-0">
                                            <div class="d-md-flex">
                                                <div class="item-card9-img">
                                                    <div class="item-card2-img ">
                                                        <div class="arrow-ribbon bg-primary">$42</div>
                                                        <a href="business.html"></a>
                                                        <img src="../assets/images/products/h6.png" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="item-card2-icons">
                                                        <a href="#" class="item-card9-icons1 wishlist"> <i class="fa fa fa-heart-o"></i></a>
                                                    </div>
                                                </div>
                                                <div class="card border-0 mb-0">
                                                    <div class="card-body ">
                                                        <div class="item-card2">
                                                            <div class="item-card2-desc">
                                                                <a href="business.html">Restaurant</a>
                                                                <a href="business.html" class="text-dark mt-2"><h4 class="font-weight-semibold mt-1">GilkonStar Hotel</h4></a>
                                                                <p class="mb-0 leading-tight">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer py-4">
                                                        <div class="item-card2-footer d-sm-flex">
                                                            <div class="d-inline-flex">
                                                                <div class="rating-star sm my-rating-5" data-stars="4s">
                                                                </div>(145reviews)
                                                            </div>
                                                            <div class="ms-auto">
                                                                <a href="#" class="location"><i class="fa fa-map-marker text-muted me-1"></i> Los Angles</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    Nothing Found !
                                @endif --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


