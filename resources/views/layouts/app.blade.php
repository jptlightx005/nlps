<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Bootstrap CSS CDN -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('page-specific-styles')
    @yield('page-specific-pre-defined-scripts')
    <style type="text/css">
        div.wrapper .content{
            padding-top:40px;
        }
    </style>
</head>
<body>
    <div class="main wrapper sidebar-active">
        @include('includes.navbar')
        @include('includes.sidebar')
        
        <!-- Page Content Holder -->
        <div class="content" id="app">
            <div class="container">
                @include('includes.messages')
                @yield('content')
            </div>
        </div>
    </div>

    @yield('modals')

    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('page-specific-scripts')
</body>
</html>
