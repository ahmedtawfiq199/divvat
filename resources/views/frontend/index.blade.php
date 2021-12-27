@extends('layouts.front')

@section('content')

<div id="doro-main">
    <aside id="doro-hero" class="js-fullheight">
        <!-- Slider -->
        <div class="flexslider js-fullheight">
            <ul class="slides">
                @foreach ($sliders as $slider)
                <li style="background-image: url({{ asset('storage/'.$slider->image) }});">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1>{{ $slider->title }}</h1>
                                        <h2>{{ $slider->sub_title }} </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </aside>
    <!-- MAIN SECTION -->
    <!-- Recent Projects -->
    <div class="doro-recent-projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">Portfolio</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">Last Projects</h2> </div>
            </div>
            <div class="row">
                @foreach ($lastProjects as $project)
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
                        <a href="{{ route('view.single.project',$project->id) }}" class="desc">
                            <div class="project"> <img src="{{ asset('storage/'.$project->main_image) }}" height="288" class="img-fluid" alt="{{ $project->title }}">
                                <div class="desc">
                                    <div class="con">
                                        <h3>{{ $project->title }}</h3> <span>{{ $project->client->name }}, {{ $project->service->name }}</span> </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

</div>

@endsection
