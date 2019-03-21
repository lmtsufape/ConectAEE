{{--
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.definitions')
    @include('layouts.app')
</html>
--}}

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>    
    @include('layouts.definitions')
</head>
<body>
    @include('layouts.app')
</body>
<script defer="defer" src="//barra.brasil.gov.br/barra.js" type="text/javascript"></script>
</html>
