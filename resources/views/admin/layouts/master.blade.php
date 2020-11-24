<html>
    <head>
        <title>Shin-team @yield('title')</title>
        <link rel="stylesheet" href="{{ asset('assets/css/public_css_bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/public_css_font-awesome.min.css') }}">
        @stack('css')
    </head>
    <body>
        @section('sidebar')
          
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script src="{{ asset('assets/js/public_js_jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('assets/js/public_js_bootstrap.min.js') }}"></script>

    @stack('scripts')
</html>