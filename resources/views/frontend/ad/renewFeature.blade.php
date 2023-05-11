

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
                        <h1>Update Your Feature</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="{{ route('home.page') }}">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Update To Feature Post</li>
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
                    action="{{ route('update.ad.feature', $updatedPost->id) }}"
                    method="post"
                    class="require-validation"
                    id="payment-form" enctype="multipart/form-data">
                    @csrf

                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Update Feature</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label text-dark">Post Ad for <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="feature_id">
                                        <option value="" disabled>Select Option</option>
                                        @foreach($features as $feature)
                                            <option value="{{$feature->id}}" @if($feature->id == $updatedPost->feature_id) selcted @endif>{{$feature->featured_days." - days ".$feature->featured_price."$"}}</option>
                                        @endforeach
                                    </select>
                                    @error('feature_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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
