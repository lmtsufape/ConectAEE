<body>
  @include('layouts.header')

  <div id="page-container" style="background-color:#eaeff3">
    <div id="content-wrap">
      @include('layouts.body')
      <br><br><br>
    </div>

    @include('layouts.footer')
  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  @include('layouts.scripts')
</body>
