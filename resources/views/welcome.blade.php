<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts._head')

<body>
    <!--============================= HEADER =============================-->

    <header>
        @include('layouts._topbar')
        @include('layouts._nav')
        @if(Route::current()->uri == "/")
            @include('layouts._slider')
        @endif
    </header>

    @yield('site.content')

    @include('layouts._footer')

    @include('layouts._scripts')

</body>

</html>
