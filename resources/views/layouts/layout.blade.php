<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/home/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/home/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/home/animate.css') }}">



    <link rel="stylesheet" href="{{ asset('css/home/headerStyle.css') }}" type="text/css" />
    <script src="{{ asset('js/home/modernizr.js') }}"></script> <!-- Modernizr -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>

  @yield('styles')

  @toastr_css


</head>
<body class="px-0">



    @yield('content')
    @include('layouts.footer')







    @jquery
    @toastr_js
    @toastr_render
    <script >
        const userId = "{{ Auth::id() }}"
    </script>
    <script src="{{ mix('js/app.js') }}" ></script>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="{{ asset('js/home/all.min.js') }}"></script>

    <script src="{{ asset('js/home/wow.min.js') }}"></script>


    <script src="{{ asset('js/home/owl.carousel.min.js') }}"></script>


    <script  src="{{asset('js/product/countdown.js')}}"></script>

    <script src="{{ asset('js/home/main.js') }}"></script>
    <script src="{{ asset('js/home/navSearch.js') }}"></script>



    <script src="{{ asset('js/home/jquery.menuAim.js') }}"></script>    <!-- menu aim -->

    <script src="{{ asset('js/home/header.js') }}" ></script>


  @yield('scripts')


</body>
</html>
