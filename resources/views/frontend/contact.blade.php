@extends('layouts.front')

@section('content')
<!-- Main Section -->
<div id="doro-main">
    <!-- Contact -->
    <div class="doro-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> <span class="heading-meta">{{ __('Location') }}</span>
                    <h2 class="doro-heading animate-box" data-animate-effect="fadeInLeft">{{ __('Contact Us') }}</h2> </div>
            </div>
            <x-alert />
            <!-- Map Section-->
            <div class="map-section">
                <div class="row">
                    <div class="col-md-12 col-sm-12 support-img animate-box" data-animate-effect="fadeInLeft">

                        <img src="{{ asset('assets/front/images/support.jpg') }}"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-6 mb-30 animate-box" data-animate-effect="fadeInLeft">
                    <h3 class="doro-about-heading">{{ __('Contact Info') }}</h3>
                    <p><i class="et-phone"></i> {{ $setting->phone }}</p>
                    <p><i class="et-envelope"></i> {{ $setting->email }}</p>
                </div>
                <!-- Contact Form -->
                <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                    <h3 class="doro-about-heading">{{ 'Contact Form' }}
                    <p>{{ __('We would like to hear from you') }}</p>
                    <form method="post" action="{{ route('view.contact.store') }}" class="row">
                        @csrf
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name" required> </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required> </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-contact" value="Say Hello!"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.footer')
</div>
@endsection
