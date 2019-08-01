<head>
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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/bootstrap-filestyle.min.js')}}"> </script>
</head>
