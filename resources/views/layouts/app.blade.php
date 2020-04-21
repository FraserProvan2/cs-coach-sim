<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>cs_ultimate_coach</title>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <main class="py-4">
            
            {{-- Main Nav --}}
            @include('includes.navbar')
           
            <div class="container">
                <div class="row justify-content-center">
                    
                    {{-- Sider Bar Nav --}}
                    @auth
                        @if(Request::path() !== 'landing')
                            <div class="col-md-3">
                                @include('includes.sidebar')
                            </div>
                        @endif
                    @endauth
                                
                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

</body>
</html>
