

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
                        <h1>Edit Ad Post</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Edit Post</li>
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
                <div class="col-md-12 col-md-12">
                    <form
                    role="form"
                    action="{{ route('adPost.update', $ad->id) }}"
                    method="post"
                    class="require-validation"
                    id="payment-form" enctype="multipart/form-data">
                    @csrf

                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Edit Add Post</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label text-dark">Ad Title <span class="text-danger">*</span></label>
                                    <input type="text" name="ad_title" class="form-control" value="{{ $ad->ad_title }}" placeholder="">
                                    @error('ad_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">Product Price($) <span class="text-danger">*</span></label>
                                    <input type="number" name="price" class="form-control" value="{{ $ad->price }}" step="any" placeholder="In Dollar">
                                    @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Short Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="short_desc" rows="6"  placeholder="text here..">{{ $ad->short_desc }}</textarea>
                                    @error('short_desc')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Long Description <span class="text-danger">*</span></label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">{!! $ad->long_desc !!}</div>
                                        <input type="hidden" name="long_desc" class="custom-editor-input">
                                    </div>
                                    @error('long_desc')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="control-group form-group">
                                    <label class="form-label text-dark">Update Media <span class="text-danger">*</span></label>
                                    <div class="input-group file-browser">
                                        <input type="file" class="form-control" name="ad_images[]" multiple>
                                    </div>
                                    @error('ad_images')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row">

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" value="{{ $ad->address }}" placeholder="Address">
                                            @error('address')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="phone" value="{{ $ad->phone }}" placeholder="Your contact number">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mt-3">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Your Website </label>
                                            <input type="text" class="form-control" name="website" value="{{ $ad->website }}" placeholder="Website link...">
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
                                            <textarea name="product_location" class="form-control" value="{{ $ad->product_location }}" placeholder="Enter google embed location link..."></textarea>
                                            @error('product_location')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-footer">
                                <button type="submit" id="submit"  class="btn btn-primary w-100 paynow">Update Post</button>
                            </div>
                        </div>
                    </form>
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
