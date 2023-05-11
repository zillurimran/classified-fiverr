

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
                <div class="col-md-12 col-md-12">
                    <form
                        role="form"
                        action="{{route('localServicePost.store')}}"
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
                                    <label class="form-label text-dark">Post Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title')}}" placeholder="Your post title">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label text-dark">City/Location</label>
                                    <input type="text" name="city_location" class="form-control" value="{{ old('city_location')}}" placeholder="Enter city/location">
                                    @error('city_location')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Select Category <span class="text-danger">*</span></label>
                                    <select class="form-control select" name="sub_category">
                                        <option value="" selected disabled>Select Option</option>
                                       
                                            <option value="a/c_heating">A/C & Heating </option>
                                            <option value="accountant_bookkeeper">Accountant/Bookkeeper </option>
                                            <option value="appliance_repair">Appliance Repair </option>
                                            <option value="auto_repair">Auto Repair </option>
                                            <option value="automotive">Automotive </option>
                                            <option value="beauty">Beauty</option>
                                            <option value="cabinetry_woodwork">Cabinetry/Woodwork</option>
                                            <option value="car_wash">Car Wash</option>
                                            <option value="catering">Catering</option>
                                            <option value="child_care">Child Care</option>
                                            <option value="cleaning_services">Cleaning Services</option>
                                            <option value="computer_repair">Computer Repair</option>
                                            <option value="construction">Construction</option>
                                            <option value="education_lessons">Education/Lessons</option>
                                            <option value="electrical">Electrical</option>
                                            <option value="events">Events</option>
                                            <option value="financial">Financial</option>
                                            <option value="furniture">Furniture</option>
                                            <option value="handy_man">Handyman</option>
                                            <option value="iron_work">Ironwork</option>
                                            <option value="insurance">Insurance</option>
                                            <option value="legal_paralegal">Legal/Paralegal</option>
                                            <option value="loan_mortgage">Loan & Mortgage</option>
                                            <option value="medical_healthcare">Medical/Healthcare</option>
                                            <option value="moving_services">Moving Services</option>
                                            <option value="music_lessons">Music Lessons</option>
                                            <option value="phone_repair">Phone Repair</option>
                                            <option value="photography_video">Photography/Video</option>
                                            <option value="plumbing">Plumbing</option>
                                            <option value="printing_publishing">Printing/Publishing</option>
                                            <option value="security_services">Security Services</option>
                                            <option value="tax_services">Tax Services</option>
                                            <option value="transportation">Transportation</option>
                                            <option value="travel_services">Travel Services</option>
                                            <option value="tutoring">Tutoring</option>
                                            <option value="real_estate">Real Estate</option>
                                            <option value="Other">Other</option>
                                       
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <div class="custom-editor-wrapper">
                                        <div class="custom-editor">{!! old('description') !!}</div>
                                        <input type="hidden" name="description" class="custom-editor-input">
                                    </div>
                                    @error('description')
                                            <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label text-dark">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name')}}">
                                    @error('company_name')
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
                                    <label class="form-label">Contact Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('contactName')}}" placeholder="Contact Name">
                                    @error('contactName')
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script> --}}
@endpush


