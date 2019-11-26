<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts._head')

<body>
    <!--============================= HEADER =============================-->

    <header>
        @include('layouts._topbar')
        @include('layouts._nav')

        @include('layouts._slider')
    </header>
<!--//END HEADER -->
@yield('site.content')
    <!--//END DETAILED CHART -->

    <!--============================= FOOTER =============================-->
    @include('layouts._footer')
            <!--//END FOOTER -->
            <!-- jQuery, Bootstrap JS. -->
    @include('layouts._scripts')

</body>

</html>
