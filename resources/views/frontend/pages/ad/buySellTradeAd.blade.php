

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
                            <li class="breadcrumb-item active text-white" aria-current="page">Buy and Trade</li>
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
                        action="{{ route('buySellTrade.ad.post') }}"
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

                                <div class="form-group" id="Business">
                                    <label class="form-label text-dark">Select Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sub_category" id="category">
                                        <option selected disabled>Select Option</option>
                                        <option value="Accounting/Bookkeeping">Accounting/Bookkeeping</option>
                                        <option value="Auto Body Shop">Auto Body Shop</option>
                                        <option value="Auto Detail Shop">Auto Detail Shop</option>
                                        <option value="Auto Repair Shop">Auto Repair Shop</option>
                                        <option value="Auto Tire Shop">Auto Tire Shop</option>
                                        <option value="Auto Transmission Shop">Auto Transmission Shop</option>
                                        <option value="Bakery/Pastry">Bakery/Pastry</option>
                                        <option value="Bar/Lounge">Bar/Lounge</option>
                                        <option value="Barber Shop">Barber Shop</option>
                                        <option value="Beauty Salon">Beauty Salon</option>
                                        <option value="Beauty Supply">Beauty Supply</option>
                                        <option value="Board & Care Facility">Board & Care Facility</option>
                                        <option value="Bookstore">Bookstore</option>
                                        <option value="Car Wash">Car Wash</option>
                                        <option value="Coffee Shop">Coffee Shop</option>
                                        <option value="Computer/Phone Store">Computer/Phone Store</option>
                                        <option value="Donut Shop">Donut Shop</option>
                                        <option value="Dry Cleaner">Dry Cleaner</option>
                                        <option value="Fast Food Restaurant">Fast Food Restaurant</option>
                                        <option value="Formal Restaurant">Formal Restaurant</option>
                                        <option value="Hospice Care">Hospice Care</option>
                                        <option value="Jewelry Store">Jewelry Store</option>
                                        <option value="Liquor Store">Liquor Store</option>
                                        <option value="Market/Grocery">Market/Grocery</option>
                                        <option value="Meat/Fish Store">Meat/Fish Store</option>
                                        <option value="Medical Supply">Medical Supply</option>
                                        <option value="Nail Salon">Nail Salon</option>
                                        <option value="Pharmacy">Pharmacy</option>
                                        <option value="Retail Store">Retail Store</option>
                                        <option value="Smoke Shop">Smoke Shop</option>
                                        <option value="Tailor/Alteration">Tailor/Alteration</option>
                                        <option value="Water Store">Water Store</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('sub_category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group" id="itemForSale">
                                    <label class="form-label text-dark">Select Sub Category <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="sub_category" id="category">
                                        <option selected disabled>Select Option</option>
                                        <option value="Accessories">Accessories </option>
                                        <option value="Animals">Animals</option>
                                        <option value="Appliances">Appliances</option>
                                        <option value="Art/Antiques">Art/Antiques</option>
                                        <option value="Baby & Kids">Baby & Kids</option>
                                        <option value="Books">Books</option>
                                        <option value="Cell Phones">Cell Phones</option>
                                        <option value="Cemetery Plots">Cemetery Plots</option>
                                        <option value="Clothing">Clothing</option>
                                        <option value="Collectables">Collectables</option>
                                        <option value="Collectables">Collectables</option>
                                        <option value="Computers">Computers</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Free Stuff">Free Stuff</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="General">General</option>
                                        <option value="Household Items">Household Items</option>
                                        <option value="Jewelry">Jewelry</option>
                                        <option value="Kitchenware">Kitchenware</option>
                                        <option value="Machinery">Machinery</option>
                                        <option value="Musical Instruments">Musical Instruments</option>
                                        <option value="Tickets">Tickets</option>
                                        <option value="Trade">Trade</option>
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
            $('#Business').hide();
            $('#itemForSale').hide();
            $('#category').change(function() {
                if (this.value == 15) {
                    $('#Business').slideDown();
                    $('#itemForSale').hide();
                }
                else if (this.value == 16) {
                    $('#itemForSale').slideDown();
                    $('#Business').hide();
                }
                else if (this.value == 13) {
                    $('#itemForSale').hide();
                    $('#Business').hide();
                }
                else if (this.value == 14) {
                    $('#itemForSale').hide();
                    $('#Business').hide();
                }
            });
        })
    </script>
@endpush

