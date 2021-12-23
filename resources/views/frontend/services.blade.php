@extends('layouts.front')

@section('content')

<div id="doro-main">
    <!-- Services -->
    <div class="doro-services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('What We Do') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Services') }}</h2> </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @foreach ($services as $service)
                        <div class="doro-feature animate-box col-md-6" data-animate-effect="fadeInLeft">
                            <div class="doro-icon"> <span class="et-mobile font-35px"></span> </div>
                            <div class="doro-text">
                                <h3>{{ $service->name }}</h3>
                                <ul class="list-unstyled">
                                    @foreach ($service->subServices as $subService)
                                        <li>{{ $subService->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6"> <img src="{{ asset('assets/front/images/services.jpg') }}" class="img-fluid mb-30 animate-box" data-animate-effect="fadeInLeft" alt=""> </div>
            </div>
        </div>
    </div>
    <!-- Recent Projects -->
    <div class="doro-projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Portfolio') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Recent Projects') }}</h2> </div>
            </div>
            <div class="row">
                @foreach ($lastProjects as $project)
                    <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                        <a href="{{ route('view.single.project',$project->id) }}" class="desc">
                            <div class="project"> <img src="{{ asset('storage/'.$project->main_image) }}" class="img-fluid" alt="{{ $project->title }}">
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
