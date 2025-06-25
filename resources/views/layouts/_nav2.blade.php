<div class="about_bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{url('/')}}"><img src="{{asset('images/Oysconmetrans.png')}}" class="responsive-logo img-fluid" alt="responsive-logo"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('about')}}">About<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admissions
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li><a class="dropdown-item" href="{{url('/admission')}}">Application Requirement</a></li>
                                        <li><a class="dropdown-item" href="{{route('admission.login')}}">Application Form</a></li>
                                        <li><a class="dropdown-item" href="{{route('invoice.activate')}}">BUY FORM</a></li>
                                        </ul>
                                    </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Academics</a>
                                </li>
                                <li class="nav-logo">
                                    <a href="{{url('/')}}" class="navbar-brand"><img src="{{asset('images/Oysconmetrans.png')}}" class="img-fluid" alt="logo"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('portal.dashboard')}}">Portal</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu">

                                        <li><a class="dropdown-item" href="{{route('events')}}">Events</a></li>
                                        <li><a class="dropdown-item" href="#">Our Lecturers</a></li>
                                        <li><a class="dropdown-item" href="#">Gallery</a></li>
                                        <li><a class="dropdown-item" href="{{asset('/job-guide')}}">Job Application</a></li>
                                            <li><a class="dropdown-item" href="{{asset('/speech')}}">Provost's Speech</a></li>
                                            <li><a class="dropdown-item" href="{{route('dashboard.login')}}">Login</a></li>
                                            <li><a class="dropdown-item" href="#">Coming Soon</a></li>
                                        </ul>
                                    </li>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>@yield('pagename')</h1>
            </div>
        </div>
    </div>
</div>
