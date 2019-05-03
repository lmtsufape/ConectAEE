<body>
    {{--
        @include('layouts.header')
        <div class="container">
            <!--Menu de Navegação-->
            @include('layouts.navigation')
            
            @include('layouts.body')
        </div>
        <br>
        @include('layouts.footer')
        
        <!--Scripts-->
        @include('layouts.scripts')
        <script src="{{asset('js/app.js')}}"></script>
    --}}
        
    @include('layouts.header')

    @include('layouts.body')

    @include('layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.scripts')
</body>