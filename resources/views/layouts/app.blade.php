<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('page-specific-styles')

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}"></script>
    @yield('page-specific-pre-defined-scripts')
</head>
<body>
    <div id="app">
        @include('includes.navbar')

        <div class="container">
            @include('includes.messages')
            @yield('content')
        </div>
    </div>

    @yield('modals')
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
