<!DOCTYPE HTML>
<html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://fonts.googleapis.com/css?family=David+Libre|Hind:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+English" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"   integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
    
        @include('inc.message')
        @include('inc.navbar')

        <section id="container" role="main">
            <div class="case">
                <div>
                
                    <header style="{{ $header['style'] }}" class="case__header {{$header['class']}}">
                        <div class="container">
                            <div class="h1-wrapper">
                                <h1 class="h1">
                                    <span class="word"><span style="color: {{ $header['color'] }}" class="tx">{{ $header['title'] }}</span></span>
                                </h1>
                            </div>
                        </div>
                    </header>

                    @yield('content')

                @section('footer')
                    @include('inc.footer')
                @show

            </div>
            </div>
        </section>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
    
    </body>
</html>