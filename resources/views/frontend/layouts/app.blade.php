<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    @yield('meta')


    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('after-styles')


    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/frontend/favicon.icon') }}">

    <!-- jQuery -->
    <script src="{{ asset('/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <!-- plugin: fancybox  -->
    <script src="{{ asset('/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="{{ asset('/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">
    <script src="{{ asset('/plugins/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- custom style -->
    <link href="{{ asset('/css/ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" media="only screen and
                (max-width: 1200px)" />

    <!-- custom javascript -->
    <script src="{{ asset('/js/script.js') }}" type="text/javascript"></script>
    <!-- cdn files -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpsGH8gYnCGTRGo0Kid7qZCwUwjK9pel4&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <script src="{{ asset('/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        /// some script

            // jquery ready start
            $(document).ready(function() {
                // jQuery code


            });
            // jquery end
    </script>
</head>

<body>

    @include('frontend.includes.header')
    @include('includes.partials.messages')

    @include('sweetalert::alert')
    @yield('content')
    @include('frontend.includes.footer')

    @include('includes.partials.ga')
</body>



<script src="{{ asset('/js/frontend.js') }}"></script>
<script src="{{ asset('/js/backend.js') }}"></script>
<script src="{{ asset('/js/vendor.js') }}"></script>


</html>
