@extends('layouts.front')

@section('content')

<div id="doro-main">
    <!-- Blog -->
    <div class="doro-blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Read') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Blog') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    @foreach ($blogs as $blog)
                        <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                            <a href="{{ route('view.single.blog',$blog->id) }}" class="blog-img"><img src="{{ asset('storage/'.$blog->main_image) }}" class="img-fluid" alt="{{ $blog->title }}"></a>
                            <div class="desc"> <span>{{ $blog->created_at->diffForHumans() }}</span>
                                <h3><a href="{{ route('view.single.blog',$blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->sub_title }}</p>
                                <p><a href="{{ route('view.single.blog',$blog->id) }}" class="lead">{{ __('Read More') }} <i class="ti-shift-right-alt"></i></a></p>
                            </div>
                        </div>
                    @endforeach


                    <!-- Pagination -->
                    <ul class="doro-pagination-wrap align-center">
                        <li><a href="#"><i class="ti-arrow-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="ti-arrow-right"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <div class="doro-sidebar-part">
                        <div class="doro-sidebar-block doro-sidebar-block-latest-posts animate-box" data-animate-effect="fadeInLeft">
                            <div class="doro-sidebar-block-title"> Latest Posts </div>
                            <div class="doro-sidebar-block-content">
                                @foreach ($blogs as $blog)
                                    <div class="latest">
                                        <a href="{{ route('view.single.blog',$blog->id) }}" class="clearfix">
                                            <div class="txt1">{{ $blog->title }}</div>
                                            <div class="txt2">{{ $blog->created_at->diffForHumans() }}</div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</div>

@endsection
