<!DOCTYPE html>
<html lang="en">


@include('admin.layout.head')

    <body data-color="grey" class="flat">
        <div id="wrapper">
            <div id="header">
                <h1><a href="#">Unicorn Admin</a></h1>
                <a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>
                <li class="btn"><a title="" href="{{route('logout')}}"><i class="fa fa-share"></i> <span class="text">Logout</span></a></li>
            </div>

            {{-- @include('admin.layout.topnav') --}}

            @include('admin.layout.nav')

            @yield('admin-content')

            @include('admin.layout.footer')
        </div>

            @include('admin.layout.scripts')
    </body>


</html>
