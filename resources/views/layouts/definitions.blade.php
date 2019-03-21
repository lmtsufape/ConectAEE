<head>
    {{--
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | AEE</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" type="text/css" rel="stylesheet">
    --}}
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!--<title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>@yield('titulo') | AEE</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/lmts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lmts-app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>