<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@if(Route::current()->uri !== "/")
    @include('layouts._head')
  @endif

  @if(Route::current()->uri == "/")
    @include('layouts._head2')
  @endif

<body>
    <!--============================= HEADER =============================-->

    <header>
      @if(Route::current()->uri !== "/")
        @include('layouts._nav2')
      @endif

        @if(Route::current()->uri == "/")
              @include('layouts._topbar')
              @include('layouts._nav')
            @include('layouts._slider')
        @endif
    </header>

    @yield('site.content')

    @include('layouts._footer')
      @if(Route::current()->uri == "/")
        @include('layouts._scripts')
      @endif

        @if(Route::current()->uri !== "/")
            @include('layouts._scripts2')
        @endif

</body>

</html>
