<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>OYSCONME - Oyo State College of Nursing and Midwifery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="{{asset('css/simple-line-icons.css')}}">
    <!-- Slider / Carousel -->
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- Main CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/larastyle.css')}}" rel="stylesheet">
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
    <div data-toggle="affix" >
    <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="index.html" class="navbar-brand nav-brand2"><img class="d-block" src="images/oysconmelogo2.png" alt="School logo"></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                                        About<span class="glyphicon glyphicon-chevron-down pull-right"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{route('about')}}">About Us</a></li>
                                        <li><a class="dropdown-item" href="{{url('/our-team')}}">College Officers</a></li>
                                    </ul>
                                  </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Admission</a>
                                </li>
                                <li class="js-navbar-collapse">
                                  <ul class="nav navbar-nav">
                                    <li class="dropdown mega-dropdown">
                                        <a href="academics.html" class="dropdown-toggle nav-link" data-toggle="dropdown">Academics <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                                        <ul class="dropdown-menu mega-dropdown-menu row">
                                          <li class="col">
                                           <img src="images/courses_1.jpg" class="img-fluid dropdown-header" alt="#">
                                       </li>
                                       <li class="col">
                                          <ul>
                                            <li class="dropdown-header">Departments</li>
                                            @foreach ($department as $key => $value)
                                              <li class="text-white"><a href="course-detail.html">{{$value}}</a></li>
                                            @endforeach
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
            <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
        </li>
    </ul>
</div>
</nav>
</div>
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
                    <img class="d-block" src="images/slider12.jpg" alt="First slide">
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
                    <img class="d-block" src="images/slider-13.jpg" alt="Second slide">
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
                    <img class="d-block" src="images/slider-13.jpg" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <h1>Campus life @ OYSCONME</h1>
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
<section class="clearfix about about-style2">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <h2>Welcome</h2>
               <p>It is my privilege to welcome the aspiring and returning students to Oyo State College of Nursing and Midwifery, Eleyele, Ibadan,
                 Nigeria which has created its own fame during the last 7 decades. Oyo State College of Nursing and Midwifery Eleyele, Ibadan
                 ensures high quality professional education through various innovative programmes keeping ‘A’ grade in position among other
                 colleges of Nursing in Nigeria. The College has a long history of providing quality nursing education fostered by visionary and
                 committed leadership. I feel honoured to be given the opportunity to lead the College in this phase of its development.</p>
                <a href="{{ url('/provost-statement') }}"><button type="button" class="btn btn-outline-dark">Read More</button></a>
            </div>
            <div class="col-md-4">
                <img src="images/provost1.jpg" class="img-fluid about-img" alt="#">
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
              @foreach ($department as $key => $value)

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="courses_box mb-5">
                        <div class="course-img-wrap">
                            <img src="images/courses_1.jpg" class="img-fluid" alt="courses-img">
                            <div class="courses_box-img">
                                <div class="courses-link-wrap">
                                    <a href="#" class="course-link"><span>course Details </span></a>
                                    <a href="#" class="course-link"><span>Join today </span></a>
                                </div>
                                <!-- // end .courses-link-wrap -->
                            </div>
                        </div>
                        <!-- // end .course-img-wrap -->
                        <div class="courses_icon">
                            <img src="images/plus-icon.png" class="img-fluid close-icon" alt="plus-icon">
                        </div>
                        <a href="course-detail.html" class="course-box-content">
                            <h3>{{$value}}</h3>
                            <p>Know more about our {{$value}} department</p>
                        </a>
                    </div>
                </div>
                @endforeach

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
              @if(!$UpcomingEvent)
              <div class="col-lg-6">
                <h2>No upcoming event</h2>
              </div>
              @else
                <div class="col-lg-6">
                    <h2>Upcoming Events</h2>
                    <div class="event-img">
                        <span class="event-img_date">{{date("d-m-y",strtotime($UpcomingEvent->expiry_date))}}</span>
                        <img src="images/upcoming-event-img.jpg" class="img-fluid" alt="event-img">
                        <div class="event-img_title">
                            <h3>{{$UpcomingEvent->title}}</h3>
                            <p>{{$UpcomingEvent->details}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6">
                    <h2>COLLEGE NEWS</h2>
                    <div class="event-date-slide">
                      @if($latestNews->isEmpty())
                      <h3>No news available at the moment</h3>
                      @else
                      <?php $j = 1;
                      $k =0;
                      $leng = (count($latestNews));
                      $length = ceil((count($latestNews))/2);?>
                      @for($i = 0; $i < $length; $i++)

                        <div class="row">
                            <div class="col-md-12">
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p></p>
                                        <span>NEWS</span>
                                    </div>
                                </div>
                                <div class="date-description">
                                    <h3>{{$latestNews[$i + $k]->title}}</h3>
                                    <p>{{substr($latestNews[$i + $k]->details,0,100)}}..</p>
                                    <a href="{{route('latestNews', ['id'=>$latestNews[$i + $k]->id, 'info'=>$latestNews[$i + $k]->title])}}">Read More</a>
                                    <hr class="event_line">
                                </div>
                              @if(($i+$j) < $leng)
                                <div class="event_date">
                                    <div class="event-date-wrap">
                                        <p></p>
                                        <span>NEWS</span>
                                    </div>
                                </div>
                               <div class="date-description">
                                  <h3>{{$latestNews[$i + $j]->title}}</h3>
                                  <p>{{substr($latestNews[$i + $j]->details,0,100)}}..</p>
                                  <a href="{{route('latestNews', ['id'=>$latestNews[$i + $j]->id, 'info'=>$latestNews[$i + $j]->title])}}">Read More</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <?php
                                $j++;
                                $k++;
                         ?>
                        @endfor
                        @endif

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
