<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      @yield('title')
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Calendar Css -->
    <link rel="stylesheet" href="css/fullcalendar.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ========================= ABOUT IMAGE =========================-->
    <div class="about_bg">
        <div class="container">
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
                                    <a href="index.html" class="navbar-brand"><img src="images/logo.png" class="img-fluid" alt="logo"></a>
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
        <div class="row">
            <div class="col-md-12">
                <h1>@yield('pagename')</h1>
            </div>
        </div>
    </div>
</div>
<div>
  @yield('content')
</div>

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
        <script src="js/moment.min.js"></script>
        <script src="js/fullcalendar.min.js"></script>
        <script src="js/instafeed.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/validate.js"></script>
        <script src="js/tweetie.min.js"></script>
        <!-- Subscribe -->
        <script src="js/subscribe.js"></script>
        <!-- Script JS -->
        <script src="js/script.js"></script>
    </body>

    </html>
