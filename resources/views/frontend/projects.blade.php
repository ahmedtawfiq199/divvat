@extends('layouts.front')

@section('content')

<div id="doro-main">
    <!-- Projects -->
    <div class="doro-projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Take a Look at') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Our Projects') }}</h2> </div>
            </div>
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">
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
    @include('layouts.footer')
</div>

@endsection
