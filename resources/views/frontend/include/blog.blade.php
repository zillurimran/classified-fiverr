@foreach ($blogs as $blog)

    <div class="col-xl-6 col-lg-12 col-md-12">
        <div class="card">
            <div class="item7-card-img">
                @if ($blog->image == '')
                <iframe width="370" height="225" src="https://www.youtube.com/embed/{{ $blog->video_link }}" class="w-100" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                @elseif($blog->video_link == '')
                        <a href="{{ route('blog.details.page', $blog->slug) }}"></a>
                        <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="img" class="cover-image">
                    @else
                @endif
                <div class="item7-card-text">
                    <span class="badge badge-success">{{ App\Models\BlogCategory::where('id', $blog->category_id)->first()->name }}</span>
                </div>
            </div>
            <div class="card-body">
                <div class="item7-card-desc d-flex mb-2">
                    <a href="#"><i class="fa fa-calendar-o text-muted me-2"></i>{{ $blog->created_at->Format('d-M-Y') }}</a>
                    <div class="ms-auto">
                        <a href="#"><i class="fa fa-comment-o text-muted me-2"></i>{{ count(\App\Models\BlogComment::where('blog_id', $blog->id)->get()) }}  Comments</a>
                    </div>
                </div>
                <a href="{{ route('blog.details.page', $blog->slug) }}" class="text-dark"><h4 class="font-weight-semibold">{{ $blog->title }}</h4></a>
                <div class="mb-4">{{ $blog->sub_title }}</div>
                <a href="{{ route('blog.details.page', $blog->slug) }}" class="btn btn-primary btn-sm">Read More</a>
            </div>
        </div>
    </div>

@endforeach
