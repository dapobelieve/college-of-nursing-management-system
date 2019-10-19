<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OYSCONME - Oyo State College of Nursing and Midwifery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/larastyle.css" rel="stylesheet">
</head>

<body>
    <!--============================= HEADER =============================-->

    <header>
      <div class="header-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-8 col-md-9">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <span class="icon-phone">+2348160126553</span>
                        </div>
                        <div class="header-top_list">
                            <span class="icon-envelope-open">info@oysconme.edu.ng</span>
                        </div>
                        <div class="header-top_list">
                            <span class="icon-location-pin">Eleyele, Ibadan Oyo state</span>
                        </div>
                    </div>
                    <div class="header-top_login2">
                      @if (Route::has('login'))
                              @auth
                                  <a href="{{ url('/home') }}">Home</a>
                              @else
                                  <a href="{{ route('login') }}">Login</a>/

                                  @if (Route::has('register'))
                                      <a href="{{ route('register') }}">Register</a>
                                  @endif
                              @endauth
                      @endif
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3" id="zinde">
                    <div class="header-top_login mr-sm-3">
                      @if (Route::has('login'))
                              @auth
                                  <a href="{{ url('/home') }}">Home</a>
                              @else
                                  <a href="{{ route('login') }}">Login</a>/

                                  @if (Route::has('register'))
                                      <a href="{{ route('register') }}">Register</a>
                                  @endif
                              @endauth
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-toggle="affix" id="scroll">
    <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="index.html" class="navbar-brand nav-brand2"><h3><b>OYSCONME</b></h3></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">About<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admission-form.html">Admissions</a>
                                </li>
                                <li class="js-navbar-collapse">
                                  <ul class="nav navbar-nav">
                                    <li class="dropdown mega-dropdown">
                                        <a href="academics.html" class="dropdown-toggle nav-link" data-toggle="dropdown">Academics <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                                        <ul class="dropdown-menu mega-dropdown-menu row">
                                          <li class="col-lg-3">
                                           <img src="images/courses_4.jpg" class="img-fluid dropdown-header" alt="#">
                                       </li>
                                       <li class="col-lg-3">
                                          <ul>
                                            <li class="dropdown-header">Science &amp; Technology</li>
                                            <li><a href="course-detail.html">Mechanical Engineering</a></li>
                                            <li><a href="course-detail.html">Computer Science</a></li>
                                            <li><a href="course-detail.html">Electrical Engineering</a></li>
                                            <li><a href="course-detail.html">Civil Engineering</a></li>
                                            <li><a href="course-detail.html">Finance</a></li>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li class="col-lg-3">
                                      <ul>
                                      <li class="dropdown-header">Management Studies</li>
                                         <li><a href="course-detail.html">Human Resource Management</a></li>
                                         <li><a href="course-detail.html">Communication Engineering</a></li>
                                         <li><a href="course-detail.html">Sales and Marketing</a></li>
                                         <li><a href="course-detail.html">Operations Management</a></li>
                                         <li><a href="course-detail.html">Information Technology</a></li>
                                         <li class="divider"></li>
                                     </ul>
                                 </li>
                                 <li class="col-lg-3">
                                   <ul>
                                   <li class="dropdown-header">Engineering</li>
                                    <li><a href="course-detail.html">Automobile Engineering</a></li>
                                    <li><a href="course-detail.html">Banking and Finance</a></li>
                                    <li><a href="course-detail.html">Anatomy</a></li>
                                    <li><a href="course-detail.html">Architecture Engineering</a></li>
                                    <li><a href="course-detail.html">Mechatronics Engineering</a></li>
                                    <li class="divider"></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                    Pages<span class="glyphicon glyphicon-chevron-down pull-right"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                    <li><a class="dropdown-item" href="index-landing-page.html">Landing Page</a></li>
                    <li><a class="dropdown-item" href="events.html">Events</a></li>
                    <li><a class="dropdown-item" href="course-detail.html">Course Details</a></li>
                    <li><a class="dropdown-item" href="campus-life.html">Campus Life</a></li>
                    <li><a class="dropdown-item" href="teachers-single.html">Our teachers</a></li>
                    <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                    <li><a class="dropdown-item" href="shortcodes.html">Shortcodes</a></li>
                    <li class="dropdown">
                      <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Others Pages</a>
                      <ul class="dropdown-menu dropdown-menu1">
                        <li><a class="dropdown-item" href="index-2.html">Home Style Two</a></li>
                        <li><a class="dropdown-item" href="index-video.html">Home Video</a></li>
                        <li><a class="dropdown-item" href="notice-board.html">Notice Board</a></li>
                        <li><a class="dropdown-item" href="chairman-speech.html">Chairman Speech</a></li>
                        <li><a class="dropdown-item" href="sample-page.html">Sample Page</a></li>
                        <li><a class="dropdown-item" href="faq.html">Faq</a></li>
                        <li><a class="dropdown-item" href="login.html">Login</a></li>
                        <li><a class="dropdown-item" href="sign-up.html">Sign Up</a></li>
                        <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="research.html">Portal</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
        </li>
    </ul>
</div>
</nav>
</div>
</div>
</div>
</div>

        <div class="container nav-menu" id="scroll2">
            <div class="row">
                <div class="col-md-12">
                    <a href="index.html"><img src="images/responsive-logo.png" class="responsive-logo img-fluid" alt="responsive-logo"></a>
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
                                    <a class="nav-link" href="about.html">About<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="admission-form.html">Admissions</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="academics.html">Academics</a>
                                </li>
                                <li class="nav-logo">
                                    <a href="#" class="navbar-brand"><img src="images/Oysconmelogo.png" class="img-fluid" alt="logo"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="research.html">Portal</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu">
                                     <li><a class="dropdown-item" href="index-2.html">Home Style Two</a></li>
                                            <li><a class="dropdown-item" href="index-video.html">Home Video</a></li>
                                        <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                        <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                        <li><a class="dropdown-item" href="index-landing-page.html">Landing Page</a></li>
                                        <li><a class="dropdown-item" href="events.html">Events</a></li>
                                        <li><a class="dropdown-item" href="course-detail.html">Course Details</a></li>
                                        <li><a class="dropdown-item" href="campus-life.html">Campus Life</a></li>
                                        <li><a class="dropdown-item" href="our-teachers.html">Our Teachers</a></li>
                                        <li><a class="dropdown-item" href="teachers-single.html">Teachers Single</a></li>
                                        <li><a class="dropdown-item" href="gallery.html">Gallery</a></li>
                                        <li><a class="dropdown-item" href="shortcodes.html">Shortcodes</a></li>
                                        <li class="dropdown">
                                          <a class="dropdown-item dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">Others Pages</a>
                                          <ul class="dropdown-menu dropdown-menu1">
                                            <li><a class="dropdown-item" href="notice-board.html">Notice Board</a></li>
                                            <li><a class="dropdown-item" href="chairman-speech.html">Chairman Speech</a></li>
                                            <li><a class="dropdown-item" href="sample-page.html">Sample Page</a></li>
                                            <li><a class="dropdown-item" href="faq.html">FAQ</a></li>
                                            <li><a class="dropdown-item" href="login.html">Login</a></li>
                                            <li><a class="dropdown-item" href="sign-up.html">Sign Up</a></li>
                                            <li><a class="dropdown-item" href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="slider_img">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block" src="images/slider.jpg" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Creative Thinking &amp; Innovation</h1>
                            <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
                            <div class="slider-btn">
                                <a href="#" class="btn btn-default">SEE Programs</a>
                                <a href="#" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="images/slider-2.jpg" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>We foster wisdom</h1>
                            <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
                            <div class="slider-btn">
                                <a href="#" class="btn btn-default">SEE Programs</a>
                                <a href="#" class="btn btn-default">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block" src="images/slider-3.jpg" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Campus life @ Unisco</h1>
                            <h4>Proactively utilize open-source users for process-centric total linkage.<br> Energistically reinvent web-enabled initiatives with premium <br>processes. Proactively drive.</h4>
                            <div class="slider-btn">
                                <a href="campus-life.html" class="btn btn-default">Campus Life</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <i class="icon-arrow-left fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <i class="icon-arrow-right fa-slider" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>
<!--//END HEADER -->
<!--============================= ABOUT =============================-->
<section class="clearfix about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    <br>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a
                    <br> type specimen book. It has survived not only five centuries</p>
                    <img src="images/welcom_sign.png" class="img-fluid" alt="welcom-img">
                </div>
            </div>
        </div>
    </section>
    <!--//END ABOUT -->
    <!--============================= OUR COURSES =============================-->
    <section class="our_courses">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Courses</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-5">
                        <div class="course-img-wrap">
                            <img src="images/courses_1.jpg" class="img-fluid" alt="courses-img">
                            <div class="courses_box-img">
                                <div class="courses-link-wrap">
                                    <a href="course-detail.html" class="course-link"><span>course Details </span></a>
                                    <a href="admission-form.html" class="course-link"><span>Join today </span></a>
                                </div>
                                <!-- // end .courses-link-wrap -->
                            </div>
                        </div>
                        <!-- // end .course-img-wrap -->
                        <div class="courses_icon">
                            <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                        </div>
                        <a href="course-detail.html" class="course-box-content">
                            <h3>Biochemistry</h3>
                            <p>When an unknown printer took a galley...</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-5">
                        <div class="course-img-wrap">
                            <img src="images/courses_2.jpg" class="img-fluid" alt="courses-img">
                            <div class="courses_box-img">
                                <div class="courses-link-wrap">
                                    <a href="course-detail.html" class="course-link"><span>course Details </span></a>
                                    <a href="admission-form.html" class="course-link"><span>Join today </span></a>
                                </div>
                                <!-- // end .courses-link-wrap -->
                            </div>
                        </div>
                        <!-- // end .course-img-wrap -->
                        <div class="courses_icon">
                            <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                        </div>
                        <a href="course-detail.html" class="course-box-content">
                            <h3>History</h3>
                            <p>When an unknown printer took a galley...</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-5">
                        <div class="course-img-wrap">
                            <img src="images/courses_3.jpg" class="img-fluid" alt="courses-img">
                            <div class="courses_box-img">
                                <div class="courses-link-wrap">
                                    <a href="course-detail.html" class="course-link"><span>course Details </span></a>
                                    <a href="admission-form.html" class="course-link"><span>Join today </span></a>
                                </div>
                                <!-- // end .courses-link-wrap -->
                            </div>
                        </div>
                        <!-- // end .course-img-wrap -->
                        <div class="courses_icon">
                            <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                        </div>
                        <a href="course-detail.html" class="course-box-content">
                            <h3>Human Sciences</h3>
                            <p>When an unknown printer took a galley...</p>
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-5">
                        <div class="course-img-wrap">
                            <img src="images/courses_4.jpg" class="img-fluid" alt="courses-img">
                            <div class="courses_box-img">
                                <div class="courses-link-wrap">
                                    <a href="course-detail.html" class="course-link"><span>course Details </span></a>
                                    <a href="admission-form.html" class="course-link"><span>Join today </span></a>
                                </div>
                                <!-- // end .courses-link-wrap -->
                            </div>
                        </div>
                        <!-- // end .course-img-wrap -->
                        <div class="courses_icon">
                            <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                        </div>
                        <a href="course-detail.html" class="course-box-content">
                            <h3>Earth Sciences</h3>
                            <p>When an unknown printer took a galley...</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-default btn-courses">View all courses</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR COURSES -->
    <!--============================= EVENTS =============================-->
    <section class="event">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Upcoming Events</h2>
                    <div class="event-img">
                        <span class="event-img_date">06-Nov-17</span>
                        <img src="images/upcoming-event-img.jpg" class="img-fluid" alt="event-img">
                        <div class="event-img_title">
                            <h3>Event Heading</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2>Important Dates</h2>
                    <div class="event-date-slide">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>06</p>
                                        <span>Nov.17</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Eestibulum sodales metus.</h3>
                                    <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book ...</p>
                                    <hr class="event_line">
                                </div>
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>10</p>
                                        <span>Nov.17</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Integer faucibus nulla a ligula.</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever...</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>05</p>
                                        <span>Oct.17</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Eestibulum sodales metus.</h3>
                                    <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book ...</p>
                                    <hr class="event_line">
                                </div>
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>06</p>
                                        <span>Nov.17</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Integer faucibus nulla a ligula.</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever...</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>06</p>
                                        <span>Sep.18</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Eestibulum sodales metus.</h3>
                                    <p>When an unknown printer took a galley of type and scrambled it to make a type specimen book ...</p>
                                    <hr class="event_line">
                                </div>
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p>06</p>
                                        <span>Mar.17</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>Integer faucibus nulla a ligula.</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END EVENTS -->
    <!--============================= DETAILED CHART =============================-->
    <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                    <div class="chart-img">
                        <img src="images/chart-icon_1.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">39</span> Teachers
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="images/chart-icon_2.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">2600</span> Students
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="images/chart-icon_3.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">56</span> Courses
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="chart-img">
                        <img src="images/chart-icon_4.png" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter">13</span> Years Exp.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//END DETAILED CHART -->
    <!--============================= OUR BLOG =============================-->
    <section class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Our Blog</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <a href="blog-post.html" class="home_blog_link">
                        <div class="blog-img_box">
                            <img src="images/blog-img_1.jpg" class="img-fluid blog_display" alt="blog-img">
                            <div class="blogtitle">
                                <h3>Eestibulum sodales</h3>
                                <i class="icon-user fa-common" aria-hidden="true"></i>
                                <p>by: admin</p>
                                <i class="icon-speedometer fa-common" aria-hidden="true"></i>
                                <p>9- Nov-2016</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="blog-post.html" class="home_blog_link">
                        <div class="blog-img_box">
                            <img src="images/blog-img_2.jpg" class="img-fluid blog_display" alt="blog-img">
                            <div class="blogtitle">
                                <h3>Variations of passages</h3>
                                <i class="icon-user fa-common" aria-hidden="true"></i>
                                <p>by: admin</p>
                                <i class="icon-speedometer fa-common" aria-hidden="true"></i>
                                <p>9- Nov-2016</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="blog-post.html" class="home_blog_link">
                        <div class="blog-img_box">
                            <img src="images/blog-img_3.jpg" class="img-fluid blog_display" alt="blog-img">
                            <div class="blogtitle">
                                <h3>Lorem Ipsum passage</h3>
                                <i class="icon-user fa-common" aria-hidden="true"></i>
                                <p>by: admin</p>
                                <i class="icon-speedometer fa-common" aria-hidden="true"></i>
                                <p>9- Nov-2016</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="blog-post.html" class="home_blog_link">
                        <div class="blog_hide">
                            <i class="icon-link" aria-hidden="true"></i>
                            <p class="m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy...</p>
                            <div class="blogtitle-link">
                                <i class="icon-user fa-common" aria-hidden="true"></i>
                                <p>by: admin</p>
                                <i class="icon-speedometer fa-common" aria-hidden="true"></i>
                                <p>9- Nov-2016</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="blog-post.html" class="home_blog_link">
                        <div class="blog-img_box">
                            <div class="blog-video">
                                <div class="blog-play_btn"> <img src="images/play-btn.png" alt="play-btn"> </div>
                                <img src="images/blog-img_4.jpg" class="img-fluid blog_display" alt="blog-img">
                            </div>
                            <!-- // end .blog-video -->
                            <div class="blogtitle">
                                <h3>Nam libero tempore</h3>
                                <i class="icon-user fa-common" aria-hidden="true"></i>
                                <p>by: admin</p>
                                <i class="icon-speedometer fa-common" aria-hidden="true"></i>
                                <p>9- Nov-2016</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" class="btn btn-default btn-courses">VIEW ALL BLOG</a>
                </div>
            </div>
        </div>
    </section>
    <!--//END OUR BLOG -->
    <!--============================= Instagram Feed =============================-->
    <div id="instafeed"></div>
    <!--//END Instagram feed JS -->
    <!--============================= FOOTER =============================-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subscribe">
                        <h3>Newsletter</h3>
                        <form id="subscribeform" action="php/subscribe.php" method="post">
                            <input class="signup_form" type="text" name="email" placeholder="Enter Your Email Address">
                            <button type="submit" class="btn btn-warning" id="js-subscribe-btn">SUBSCRIBE</button>
                            <div id="js-subscribe-result" data-success-msg="Success, Please check your email." data-error-msg="Oops! Something went wrong"></div>
                            <!-- // end #js-subscribe-result -->
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="foot-logo">
                        <a href="index.html">
                            <img src="images/footer-logo.png" class="img-fluid" alt="footer_logo">
                        </a>
                        <p>2016 © copyright
                            <br> All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="sitemap">
                            <h3>Navigation</h3>
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="admission-form.html">Admissions </a></li>
                                <li><a href="admission.html">Academics</a></li>
                                <li><a href="research.html">Research</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="tweet_box">
                            <h3>Tweets</h3>
                            <div class="tweet-wrap">
                                <div class="tweet"></div>
                                <!-- // end .tweet -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="address">
                            <h3>Contact us</h3>
                            <p><span>Address: </span> Unisco university Albany, NY, USA. 11001</p>
                            <p>Email : info@unisco.com
                                <br> Phone : +91 555 668 986</p>
                                <ul class="footer-social-icons">
                                    <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--//END FOOTER -->
            <!-- jQuery, Bootstrap JS. -->
            <script src="js/jquery.min.js"></script>
            <script src="js/tether.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <!-- Plugins -->
            <script src="js/slick.min.js"></script>
            <script src="js/waypoints.min.js"></script>
            <script src="js/counterup.min.js"></script>
            <script src="js/instafeed.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/validate.js"></script>
            <script src="js/tweetie.min.js"></script>
            <!-- Subscribe -->
            <script src="js/subscribe.js"></script>
            <!-- Script JS -->
            <script src="js/script.js"></script>
            <script>
            $(document).ready(function(){
            $(function () {
                  var lastScrollTop = 205;

                  $(window).scroll(function(event){

                  var st = $(this).scrollTop();
                  if (st > lastScrollTop ) {
                  $('#scroll').show()

                  } else {
                  $('#scroll').hide()

                  }
                  lastScrollTop = 205;
                  });
                });
                });

            </script>
        </body>

        </html>
