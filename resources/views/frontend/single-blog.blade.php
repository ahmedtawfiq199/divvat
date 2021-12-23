@extends('layouts.front')

@section('content')

<div id="doro-main">
    <div class="doro-projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Blog') }}</span>
                    <h2 class="doro-post-heading animate-box" data-animate-effect="fadeInLeft">{{ $blog->title }}</h2> </div>
            </div>
            <div class="row">
                <div class="col-md-12 image-content animate-box fadeInLeft animated" data-animate-effect="fadeInLeft"> <img src="{{ asset('storage/'.$blog->main_image) }}" class="img-fluid mb-30" alt="{{ $blog->title }}"> </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                   {!! $blog->description !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</div>

@endsection
