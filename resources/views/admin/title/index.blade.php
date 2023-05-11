@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | Title Settings
@endsection

@section('titles')
    active
@endsection
@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
@endpush
@section('content')
<section id="basic-vertical-layouts">
    <div class="row">
        <div class="col-md-12 col-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Title Settings</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('titleSettings.update', $titles->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="banner_title">Banner Title <span class="text-danger">*</span></label>
                                    <input type="text" name="banner_title" value="{{ titleSettings()->banner_title }}" id="banner_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('banner_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="banner_subTitle">Banner Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="banner_subTitle" value="{{ titleSettings()->banner_subTitle }}" id="banner_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('banner_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="location_title">Location Title <span class="text-danger">*</span></label>
                                    <input type="text" name="location_title" value="{{ titleSettings()->location_title }}" id="location_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('location_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="location_subTitle">Location Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="location_subTitle" value="{{ titleSettings()->location_subTitle }}" id="location_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('location_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="category_title">Category Title <span class="text-danger">*</span></label>
                                    <input type="text" name="category_title" value="{{ titleSettings()->category_title }}" id="category_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('category_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="category_subTitle">Category Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="category_subTitle" value="{{ titleSettings()->category_subTitle }}" id="category_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('category_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="feature_title">Feature Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature_title" value="{{ titleSettings()->feature_title }}" id="feature_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('feature_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="feature_subTitle">Feature Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature_subTitle" value="{{ titleSettings()->feature_subTitle }}" id="feature_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('feature_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subscribe_title">Subscribe Title <span class="text-danger">*</span></label>
                                    <input type="text" name="subscribe_title" value="{{ titleSettings()->subscribe_title }}" id="subscribe_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('subscribe_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subscribe_subTitle">Subscribe Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="subscribe_subTitle" value="{{ titleSettings()->subscribe_subTitle }}" id="subscribe_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('subscribe_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="latest_ad_title">Latest Ads Title <span class="text-danger">*</span></label>
                                    <input type="text" name="latest_ad_title" value="{{ titleSettings()->latest_ad_title }}" id="latest_ad_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('latest_ad_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="latest_ad_subTitle">Latest Ads Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="latest_ad_subTitle" value="{{ titleSettings()->latest_ad_subTitle }}" id="latest_ad_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('latest_ad_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="testimonial_title">Testimonials Title <span class="text-danger">*</span></label>
                                    <input type="text" name="testimonial_title" value="{{ titleSettings()->testimonial_title }}" id="testimonial_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('testimonial_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="testimonial_subTitle">Testimonials Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="testimonial_subTitle" value="{{ titleSettings()->testimonial_subTitle }}" id="testimonial_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('testimonial_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="blog_title">Blog Title <span class="text-danger">*</span></label>
                                    <input type="text" name="blog_title" value="{{ titleSettings()->blog_title }}" id="blog_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('blog_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="blog_subTitle">Blog Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="blog_subTitle" value="{{ titleSettings()->blog_subTitle }}" id="blog_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('blog_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section1_title">About Section 1 Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section1_title" value="{{ titleSettings()->about_section1_title }}" id="about_section1_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('about_section1_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section1_subTitle">About Section 1 Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section1_subTitle" value="{{ titleSettings()->about_section1_subTitle }}" id="about_section1_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('about_section1_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section3_title">About Section 2 Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section2_title" value="{{ titleSettings()->about_section2_title }}" id="about_section2_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('about_section2_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section2_subTitle">About Section 2 Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section2_subTitle" value="{{ titleSettings()->about_section2_subTitle }}" id="about_section2_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('about_section2_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section3_title">About Section 3 Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section3_title" value="{{ titleSettings()->about_section3_title }}" id="about_section3_title" class="form-control" placeholder="Enter Banner Title"/>
                                    @error('about_section3_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_section3_subTitle">About Section 3 Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="about_section3_subTitle" value="{{ titleSettings()->about_section3_subTitle }}" id="about_section3_subTitle" class="form-control" placeholder="Enter Banner Sub Title"/>
                                    @error('about_section3_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('page-js')

@endpush
