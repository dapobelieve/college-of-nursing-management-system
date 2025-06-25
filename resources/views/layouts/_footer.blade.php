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

          <div class="col-sm-4">
              <div class="foot-logo">
                  <a href="{{url('/')}}">
                      <img src="{{asset('images/Oysconmetrans.png')}}" class="img-fluid" alt="footer_logo">
                  </a>
                  <p> © 2019 OYSCONME
                      <br> All rights reserved.</p>
              </div>
          </div>

            <div class="col-md-4">
                <div class="sitemap">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="{{asset('about')}}">About</a></li>
                        <li><a href="{{url('/admission')}}">Admissions </a></li>
                        <li><a href="#">Academics</a></li>
                        <li><a href="{{route('portal.dashboard')}}">Student Portal</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>


            <!--    <div class="col-md-4">
                    <div class="tweet_box">
                        <h3>Tweets</h3>
                        <div class="tweet-wrap">
                            <div class="tweet"></div>

                        </div>
                    </div>
                </div> -->

            <div class="col-md-4">
                <div class="address">
                    <h3>Contact us</h3>
                    <p><span>Address: </span> Oyo State College of Nursing and Midwifery, Eleyele Ibadan. PMB 5081 Eleyele Ibadan, Nigeria.  </p>
                    <p>Email : info@oysconme.edu.ng
                        <br> Phone : +2349138766976</p>
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
