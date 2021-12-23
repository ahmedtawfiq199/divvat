<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ (App\Models\Websit::latest()->first()->websit_title ?? config('app.name', 'Laravel')) }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png"
        href="{{asset('storage/'. (App\Models\Websit::latest()->first()->favicon_image ?? 'assets/favicon.png'))}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/et-lineicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144098545-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-144098545-1');
    </script>
</head>

<body>
    <div id="doro-page"> <a href="#" class="js-doro-nav-toggle doro-nav-toggle"><i></i></a>
        <!-- Sidebar Section -->
        <aside id="doro-aside">
            <!-- Logo -->
            <h1 id="doro-logo">
                <a href="index.html"><img
                        src="{{asset('storage/'. (App\Models\Websit::latest()->first()->logo ?? 'assets/favicon.png'))}}"
                        height="80" width="166" /></a>
            </h1>
            <!-- Menu -->
            <nav id="doro-main-menu">
                <ul>
                    <li><a href="{{ route('view.index') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('view.projects') }}">{{ __('Projects') }}</a></li>
                    @if($about = App\Models\Page::where('title','LIKE','about us')->first())<li><a
                            href="{{ route('view.about',$about->id) }}">{{ __('About') }}</a></li>@endif
                    <li><a href="{{ route('view.services') }}">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('view.blogs') }}">{{ __('Blog') }}</a></li>
                    <li><a href="{{ route('view.contact') }}">{{ __('Contact Us') }}</a></li>

                </ul>
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@getbootstrap">{{ __('Need Service') }}</button>
                <button type="button" id="alert" data-bs-toggle="modal" data-bs-target="#alertModal"
                    data-bs-whatever="@getbootstrap" style="display: none;">{{ __('Success Alert') }}</button>
            </nav>
            <!-- Sidebar Footer -->
            <div class="doro-footer">
                <ul>
                    @if($link = App\Models\Websit::first()->facebook) <li><a href="{{ $link }}"><i
                                class="ti-facebook font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->twitter) <li><a href="{{ $link }}"><i
                                class="ti-twitter-alt font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->instagram) <li><a href="{{ $link }}"><i
                                class="ti-instagram font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->linkedin) <li><a href="{{ $link }}"><i
                                class="ti-linkedin font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->youtube) <li><a href="{{ $link }}"><i
                                class="ti-youtube font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->whatsapp) <li><a href="{{ $link }}"><i
                                class="fa fa-whatsapp font-14px gray-icon"></i></a></li>@endif
                    @if($link = App\Models\Websit::first()->behance) <li><a href="{{ $link }}"><i
                                class="fa fa-behance font-14px gray-icon"></i></a></li>@endif
                </ul>
                <p><small>&copy;{{ __('2021 Divvat. All rights reserved') }}</small></p>
            </div>


        </aside>

        <!-- Main Section -->

        @yield('content')

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Contact Us') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="orderForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="col-form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="col-form-label">{{ __('Phone Number') }}</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="service_id" class="col-form-label">{{ __('Service') }}</label>
                                <select name="service_id" id="service_id" class="form-control">
                                    @foreach (App\Models\Service::all() as $service)
                                    <option @if($service->id == old('service_id')) selected @endif value="{{
                                        $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="description" class="col-form-label">{{ __('Message') }}</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="closeModel" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="create_order" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Success') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-success" role="alert">
                               {{ __('the message has been sent successfully') }}
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $('#orderForm').submit(function(e){
                e.preventDefault();
                //console.log('done!');
                //var formData = new FormData($('#orderForm')[0]);
                $.ajax({
                    type:'post',
                    url: '{{route('view.new.order')}}',
                    data: {
                    '_token': $("input[name='_token']").val(),
                    'name': $("#name").val(),
                    'email': $("#email").val(),
                    'phone': $("input[name='phone']").val(),
                    'service_id': $("select[name='service_id']").val(),
                    'description': $("#description").val(),
                    },
                    success: function(data){
                        if(data.status){
                            $("#closeModel").click();
                            $("#alertModal").modal("show");
                        }
                    }
                });
            });
        </script>
        <!-- Js -->

        <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/modernizr-2.6.2.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/jquery.flexslider-min.js') }}"></script>
        <script src="{{ asset('assets/front/js/sticky-kit.min.js') }}"></script>
        <script src="{{ asset('assets/front/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
