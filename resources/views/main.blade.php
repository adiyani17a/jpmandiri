<!DOCTYPE html>
<html lang="id">
@include('layouts._head')
@yield('extra_style')
<body>
  <div class="container-scroller">
    @include('layouts._topnav')
    <div class="container-fluid page-body-wrapper">
      @include('layouts._sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layouts._footer')
      </div>
    </div>
  </div>
  @include('layouts._script')
  @yield('extra_script')
</body>
</html>
