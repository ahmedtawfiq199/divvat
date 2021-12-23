@extends('layouts.front')

@section('content')

<!-- Main Section -->
<div id="doro-main">
    <div class="doro-projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Portfolio') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ $project->title }}</h2> </div>
            </div>
            <div class="row">
                <div class="col-md-8 image-content animate-box fadeInLeft animated" data-animate-effect="fadeInLeft"> <img class="img-fluid mb-30" src="{{ asset('storage/'.$project->main_image) }}" alt="{{ $project->title }}"></div>
                <div class="col-md-4 sticky-parent animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                    <div id="sticky_item">
                        <div class="project-desc">
                            <h2>{{ $project->id }} - {{ $project->client->name }}</h2>
                            <p><b>{{ __('Project Name:') }}</b> {{ $project->title }}
                                <br><b>{{ __('Client:') }}</b> {{ $project->client->name }}
                            </p>
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
