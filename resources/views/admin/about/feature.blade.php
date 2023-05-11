@extends('layouts.dashboard')

@section('title')
    {{ config("app.name") }} | About Feature
@endsection

@section('aboutFeature')
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
                    <h4 class="card-title">Update About Feature {For Icon: Use Fontawesome}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('aboutFeature.update', $feature->id) }}" method="POST" class="form form-vertical" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row">

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature1_icon">Feature One Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature1_icon" value="{{ $feature->feature1_icon }}" id="feature1_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature1_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature1_title">Feature One Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature1_title" value="{{ $feature->feature1_title }}" id="feature1_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature1_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature1_subTitle">Feature One Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature1_subTitle" value="{{ $feature->feature1_subTitle }}" id="feature1_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature1_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature2_icon">Feature Two Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature2_icon" value="{{ $feature->feature2_icon }}" id="feature2_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature2_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature2_title">Feature Two Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature2_title" value="{{ $feature->feature2_title }}" id="feature2_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature2_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature2_subTitle">Feature Two Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature2_subTitle" value="{{ $feature->feature2_subTitle }}" id="feature2_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature2_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature3_icon">Feature Three Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature3_icon" value="{{ $feature->feature3_icon }}" id="feature3_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature3_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature3_title">Feature Three Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature3_title" value="{{ $feature->feature3_title }}" id="feature3_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature3_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature3_subTitle">Feature Three Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature3_subTitle" value="{{ $feature->feature3_subTitle }}" id="feature3_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature3_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature4_icon">Feature Four Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature4_icon" value="{{ $feature->feature4_icon }}" id="feature4_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature4_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature4_title">Feature Four Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature4_title" value="{{ $feature->feature4_title }}" id="feature4_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature4_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature4_subTitle">Feature Four Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature4_subTitle" value="{{ $feature->feature4_subTitle }}" id="feature4_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature4_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature5_icon">Feature Five Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature5_icon" value="{{ $feature->feature5_icon }}" id="feature5_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature5_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature5_title">Feature Five Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature5_title" value="{{ $feature->feature5_title }}" id="feature5_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature5_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature5_subTitle">Feature Five Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature5_subTitle" value="{{ $feature->feature5_subTitle }}" id="feature5_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature5_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature6_icon">Feature Six Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature6_icon" value="{{ $feature->feature6_icon }}" id="feature6_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature6_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature6_title">Feature Six Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature6_title" value="{{ $feature->feature6_title }}" id="feature6_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature6_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature6_subTitle">Feature Six Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature6_subTitle" value="{{ $feature->feature6_subTitle }}" id="feature6_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature6_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature7_icon">Feature Seven Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature7_icon" value="{{ $feature->feature7_icon }}" id="feature7_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature7_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature7_title">Feature Seven Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature7_title" value="{{ $feature->feature7_title }}" id="feature7_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature7_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature7_subTitle">Feature Seven Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature7_subTitle" value="{{ $feature->feature7_subTitle }}" id="feature7_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature7_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature8_icon">Feature Eight Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature8_icon" value="{{ $feature->feature8_icon }}" id="feature8_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature8_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature8_title">Feature Eight Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature8_title" value="{{ $feature->feature8_title }}" id="feature8_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature8_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature8_subTitle">Feature Eight Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature8_subTitle" value="{{ $feature->feature8_subTitle }}" id="feature8_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature8_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature9_icon">Feature Nine Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature9_icon" value="{{ $feature->feature9_icon }}" id="feature9_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature9_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature9_title">Feature Nine Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature9_title" value="{{ $feature->feature9_title }}" id="feature9_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature9_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature9_subTitle">Feature Nine Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature9_subTitle" value="{{ $feature->feature9_subTitle }}" id="feature9_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature9_subTitle')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature10_icon">Feature Ten Icon <span class="text-danger">*</span></label>
                                    <input type="text" name="feature10_icon" value="{{ $feature->feature10_icon }}" id="feature10_icon" class="form-control" placeholder="Enter App title"/>
                                    @error('feature10_icon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature10_title">Feature Ten Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature10_title" value="{{ $feature->feature10_title }}" id="feature10_title" class="form-control" placeholder="Enter App title"/>
                                    @error('feature10_title')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="feature10_subTitle">Feature Ten Sub Title <span class="text-danger">*</span></label>
                                    <input type="text" name="feature10_subTitle" value="{{ $feature->feature10_subTitle }}" id="feature10_subTitle" class="form-control" placeholder="Enter App title"/>
                                    @error('feature5_subTitle')
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
