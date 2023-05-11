

@extends('frontend.layout.main')

@push('plugins-css')
    <link rel="stylesheet" href="{{ asset('app-assets/assets/plugins/quill/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endpush

@push('plugins-js')
    <script src="{{ asset('app-assets/assets/plugins/quill/js/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/plugins/quill/js/quill-image-resize.min.js') }}"></script>
@endpush

@push('custom-css')
    <style>
        .ql-editor {
            min-height: 200px
        }
    </style>
@endpush

@push('custom-js')
    <script>
        $(document).ready(function (){
            (function(){
                if($(".custom-editor-wrapper").length){
                    $(".custom-editor-wrapper").each(function (index, element) {
                        let quillEditor = new Quill(element.children[0], {
                            modules: {
                                imageResize: {
                                    displaySize: true
                                },
                                toolbar: [
                                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                                    ["bold", "italic", "underline", "strike"],
                                    ["blockquote", "code-block"],
                                    ["image", "video"],
                                    ["link"],
                                    [{ script: "sub" }, { script: "super" }],
                                    [{ list: "ordered" }, { list: "bullet" }],
                                    [{ color: [] }, { background: [] }],
                                    [{ align: [] }],
                                    ["clean"]
                                ]
                            },
                            theme: "snow"
                        });
                        quillEditor.on("text-change", function (delta, source) {
                            $(element).find(".custom-editor-input").val(quillEditor.root.innerHTML);
                        });
                    });
                }
            })();
        })
    </script>
@endpush

@section('main')
    <!--Breadcrumb-->
    <section>
        <div class="bannerimg cover-image bg-background3" data-bs-image-src="{{ asset('uploads/generalSettings') }}/{{ generalSettings()->banner_image}}">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white">
                        <h1 class="">Ad Post</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Ad Post</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Breadcrumb-->

    <!--Add posts-section-->
    <section class="sptb">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 col-md-12 col-md-12">
                    <form
                    role="form"
                    action="{{ route('stripe.post') }}"
                    method="post"
                    class="require-validation"
                    data-cc-on-file="false"
                    data-stripe-publishable-key="{{env("STRIPE_KEY")}}"
                    id="payment-form" enctype="multipart/form-data">
                    @csrf

                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Add Post</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label text-dark">Ad Title <span class="text-danger">*</span></label>
                                    <input type="text" name="ad_title" class="form-control" value="{{ old('ad_title')}}" placeholder="">
                                    @error('ad_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Product Price($) <span class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price')}}" step="any" placeholder="In Dollar">
                                    @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Ad Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="category_id">
                                        <option value="" selected disabled>Select Option</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Post Ad for <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="package_id">
                                        <option value="" disabled>Select Option</option>
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->days." - days ".$package->package_price."$"}}</option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
									<label class="form-label text-dark">Want to Feature this Ad ?</label>
									<div class="d-md-flex ad-post-details">
										<label class="custom-control custom-radio mb-2 me-4">
											<input type="radio" class="custom-control-input" name="featured" value="yes">
											<span class="custom-control-label"><a href="#" class="text-muted">Yes</a></span>
										</label>
										<label class="custom-control custom-radio  mb-2">
											<input type="radio" class="custom-control-input" name="featured" value="no" checked>
											<span class="custom-control-label"><a href="#" class="text-muted">No</a></span>
										</label>
									</div>
								</div>

                                <div class="form-group hide" id="featureAdDiv">
                                    <label class="form-label text-dark">Feature Ad for</label>
                                    <select class="form-control select2" name="featured_id">
                                        <option value="" selected disabled>Select Option</option>
                                        @foreach($featurePackages as $featurePackage)
                                            <option value="{{$featurePackage->id}}">{{$featurePackage->featured_days." - days ".$featurePackage->featured_price."$"}}</option>
                                        @endforeach
                                    </select>
                                    @error('package_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Short Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="short_desc" rows="6"  placeholder="text here..">{{old('short_desc')}}</textarea>
                                    @error('short_desc')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Long Description <span class="text-danger">*</span></label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">{!! old('long_desc') !!}</div>
                                        <input type="hidden" name="long_desc" class="custom-editor-input">
                                    </div>
                                    @error('long_desc')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label text-dark">Add Media <span class="text-danger">*</span></label>
                                    <div class="input-group file-browser">
                                        <input type="file" class="form-control" name="ad_images[]" multiple>
                                    </div>
                                    @error('ad_images')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Select Country <span class="text-danger">*</span></label>
                                        <select class="form-control select2-show-search" name="country_id">
                                            <option selected disabled>Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Address">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone ?? old('phone')}}" placeholder="Your contact number">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Your Website </label>
                                            <input type="text" class="form-control" name="website" value="{{old('website')}}" placeholder="Website link...">
                                            @error('website')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-0 mt-3">
                                            <label class="form-label">Keywords for your Ad </label>
                                            <input type="text" class="form-control" name="keywords[]"  placeholder="Example: House, Home...">
                                            @error('keywords')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-0 mt-3">
                                            <label class="form-label">Location of your product </label>
                                            <textarea name="product_location" class="form-control" value="{{old('product_location')}}" placeholder="Enter google embed location link..."></textarea>
                                            @error('product_location')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            {{-- <div class="card-header">
                                <h3 class="card-title">Payments</h3>
                            </div> --}}
                             {{-- <div class="card-body">
                                <div class=" border p-5">
                                    <div class="panel panel-primary">
                                        <div id="card-element">

                                        </div>
                                         <div class="panel-body tabs-menu-body ps-0 pe-0 border-0 pb-0">
                                            <div class="tab-content">
                                                <div class="tab-pane active " id="tab5">
                                                    <div class="form-group">
                                                        <label class="form-label">CardHolder Name</label>
                                                        <input type="text" class="form-control" id="name1" placeholder="First Name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Card number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Search for...">
                                                            <span class="input-group-text bg-transparent border-0 p-0">
                                                                <button class="btn btn-info" type="button"><i class="fa fa-cc-visa"></i> &nbsp; <i class="fa fa-cc-amex"></i> &nbsp;
                                                                <i class="fa fa-cc-mastercard"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group mb-sm-0">
                                                                <label class="form-label">Expiration</label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" placeholder="MM" name="expiremonth">
                                                                    <input type="number" class="form-control" placeholder="YY" name="expireyear">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 ">
                                                            <div class="form-group mb-0">
                                                                <label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
                                                                <input type="number" class="form-control" required="" aria-required="true">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                             </div>
                                        </div>
                                    </div>
                                    <div class="form-group row clearfix mb-0">
                                        <div class="col-lg-12">
                                            <div class="checkbox checkbox-info">
                                                <label class="custom-control mt-4 mb-0 form-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-label text-dark ps-2">I agree with the Terms and Conditions.</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div id="card-errors" style="color: red;"></div>
                                        <div id="card-thank" style="color: green;"></div>
                                        <div id="card-message" style="color: green;"></div>
                                        <div id="card-success" style="color: green;font-weight:bolder"></div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-footer">
                                <button type="submit" id="submit"  class="btn btn-primary w-100 paynow">Post Ad</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Terms And Conditions</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled widget-spec  mb-0">
                                @foreach ($terms as $term)
                                    <li>
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        {{ $term->name }}
                                    </li>
                                @endforeach

                                {{-- <li class="ms-5 mb-0">
                                    <a href=""> View more..</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Benefits Of Premium Ad</h3>
                        </div>
                        <div class="card-body pb-2">
                            <ul class="list-unstyled widget-spec vertical-scroll mb-0">
                                @foreach ($benefits as $benefit)

                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                    {{ $benefit->name }}
                                </li>

                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header">
                            <h3 class="card-title">Safety Tips For Buyers</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled widget-spec  mb-0">
                                @foreach ($tips as $tip)

                                <li>
                                    <i class="fa fa-check text-success" aria-hidden="true"></i>
                                    {{ $tip->name }}
                                </li>

                                @endforeach

                                {{-- <li class="ms-5 mb-0">
                                    <a href=""> View more..</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--/Add posts-section-->

    @include('frontend/section/newsletter', ['class' => 'bg-white'])

@endsection
@push('custom-js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script> --}}
<script>
    $(document).ready(function(){
        $('input[type=radio][name=featured]').change(function() {
    if (this.value == 'yes') {
        $('#featureAdDiv').removeClass('hide')
    }
    else if (this.value == 'no') {
        $('#featureAdDiv').addClass('hide')
    }
});
    })
</script>
@endpush
