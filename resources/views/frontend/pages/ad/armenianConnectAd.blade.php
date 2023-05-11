

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
                            <li class="breadcrumb-item active text-white" aria-current="page">Armenian Connect</li>
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
            <div class="row">
                <div class="col-md-12 col-md-12">
                    <form
                        role="form"
                        action="{{ route('armenia.ad.post') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        id="payment-form" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header ">
                                <h3 class="card-title">Add Post</h3>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="category_id" value="{{$id}}">
                                <div class="form-group">
                                    <label class="form-label text-dark">Ad Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title')}}" placeholder="">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="category" id="category">
                                        <option value="" selected disabled>Select Option</option>
                                        @foreach($subCategories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group" id="professional">
                                    <label class="form-label text-dark">Select Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sub_category" id="category">
                                        <option selected disabled>Select Option</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Business">Business</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Law">Law</option>
                                        <option value="Medicine">Medicine</option>
                                        <option value="Psychology">Psychology</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Others">Others</option>

                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group" id="hobby">
                                    <label class="form-label text-dark">Select Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sub_category" id="category">
                                        <option selected disabled>Select Option</option>
                                        <option value="Art/Painting">Art/Painting</option>
                                        <option value="Cars/Motorcycles">Cars/Motorcycles</option>
                                        <option value="Chess/Backgammon">Chess/Backgammon</option>
                                        <option value="Computer Gaming">Computer Gaming</option>
                                        <option value="Cooking/Baking">Cooking/Baking</option>
                                        <option value="Creative/Crafts">Creative/Crafts</option>
                                        <option value="Dancing">Dancing</option>
                                        <option value="Dating/Friendship">Dating/Friendship</option>
                                        <option value="Exercising">Exercising</option>
                                        <option value="Gardening">Gardening</option>
                                        <option value="Hiking">Hiking</option>
                                        <option value="Literature/Poetry">Literature/Poetry</option>
                                        <option value="Music">Music</option>
                                        <option value="Politics">Politics</option>
                                        <option value="Religion">Religion</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group" id="volunteer">
                                    <label class="form-label text-dark">Select Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sub_category" id="category">
                                        <option selected disabled>Select Option</option>
                                        <option value="Charity/Non-Profit">Charity/Non-Profit</option>
                                        <option value="Coaching/Sports">Coaching/Sports</option>
                                        <option value="Community Services">Community Services</option>
                                        <option value="Education">Education</option>
                                        <option value="Government">Government</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Price ($)</label>
                                    <input type="number" name="price" class="form-control" value="{{ old('price')}}">
                                    @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">City/Location <span class="text-danger">*</span></label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city')}}">
                                    @error('city')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">{!! old('description') !!}</div>
                                        <input type="hidden" name="description" class="custom-editor-input">
                                    </div>
                                    @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Contact Name</label>
                                    <input type="text" class="form-control" name="userName" value="{{old('userName')}}" placeholder="Contact Name">
                                    @error('userName')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Address">
                                    @error('address')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tel No</label>
                                    <input type="phone" class="form-control" name="telNo" value="{{old('telNo')}}" placeholder="Tel. No">
                                    @error('telNo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Alt. Tel No</label>
                                    <input type="phone" class="form-control" name="altTelNo" value="{{old('altTelNo')}}" placeholder="Alt Tel. No">
                                    @error('altTelNo')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" name="website" value="{{old('website')}}" placeholder="Website">
                                    @error('website')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="control-group form-group">
                                    <label class="form-label text-dark">Add Images</label>
                                    <div class="input-group file-browser">
                                        <input type="file" class="form-control" name="images[]" multiple>
                                    </div>
                                    @error('images')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group mt-3">
                                    <label class="form-label">Keywords for your Ad </label>
                                    <input type="text" class="form-control" name="keywords[]"  placeholder="Example: House, Home...">
                                    @error('keywords')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                {{-- for office use only --}}
                                <div class="card p-3">
                                    <h5>For office Use Only</h5>
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="form-label">Contact Name<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="contactName" value="{{old('contactName')}}" placeholder="Contact Name">
                                            @error('contactName')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact Tel<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="contactTelNo" value="{{old('contactTelNo')}}" placeholder="Contact Tel No.">
                                            @error('contactTelNo')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="contactEmail" value="{{old('contactEmail')}}" placeholder="Contact Email">
                                            @error('contactEmail')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card">
                            <div class="card-footer">
                                <button type="submit" id="submit"  class="btn btn-primary w-100 paynow">Post Ad</button>
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
    <script>
        $(document).ready(function(){
            $('#professional').hide();
            $('#hobby').hide();
            $('#volunteer').hide();
            $('#category').change(function() {
                if (this.value == 19) {
                    $('#professional').slideDown();
                    $('#hobby').hide();
                    $('#volunteer').hide();
                }
                else if (this.value == 20) {
                    $('#hobby').slideDown();
                    $('#professional').hide();
                    $('#volunteer').hide();
                }
                else if (this.value == 21) {
                    $('#volunteer').slideDown();
                    $('#hobby').hide();
                    $('#professional').hide();
                }
            });
        })
    </script>
@endpush

