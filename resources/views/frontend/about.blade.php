@extends('layouts.front')

@section('content')

<!-- Main Section -->
<div id="doro-main">
    <!-- About Us -->
    <div class="doro-about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="heading-meta">{{ __('We Are Agency') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('About Us') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                   <img src="{{ asset('storage/'.$about->main_image) }}" class="img-fluid mb-30 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft" alt="">
                </div>
                <div class="col-md-6 animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">{{ __('Divvat') }}</span>
                    <h3 class="doro-about-heading">{{ $about->title }}</h3>
                    {!! $about->description !!}
                </div>
            </div>
        </div>
    </div>
    <!-- Our Team -->
    <div class="doro-team">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <span class="heading-meta">{{ __('Thinkers') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Creative Team') }}</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
                        <div class="team">
                        <img src="{{ asset('storage/'.$team->image) }}" class="img-fluid" alt="">
                            <div class="desc">
                                <div class="con">
                                    <h3><a href="">{{ $team->name }}</a></h3> <span>{{ $team->position }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</div>
@endsection
