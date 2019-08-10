<div id="navigation" style="background-color:#eaeff3">
  @php($url = str_replace(URL::to('/'),'',URL::current()))

  <div style="margin-top: -30px" class="container">
    <div class="row">
      <div class="col-md-12">
        <br>
        <h4>
          @yield('navbar')
        </h4>
        <br>
      </div>
    </div>
  </div>

</div>
