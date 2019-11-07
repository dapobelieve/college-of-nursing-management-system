@extends('layout')

@section('title')
Contact Us - OYSCONME
@stop

@section('pagename')
Contact Us
@stop

@section('content')
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Contact Details</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form " style="background-color:#f09ac0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 contact-option">
                            <div class="contact-option_rsp">
                                <h3>Leave a message</h3>
                                <form action="" method="post" id="phpcontactform">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control" name="message" required rows="5"></textarea>
                                    </div>
                                    <!-- // end .form-group -->
                                    <button type="submit" class="btn btn-default btn-submit" id="js-contact-btn">SUBMIT</button>
                                    <div id="js-contact-result" data-success-msg="Success, Your message has been sent" data-error-msg="Oops! Something went wrong"></div>
                                    <!-- // end #js-contact-result -->
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="contact-address">
                                <h3>Location</h3>
                                <div class="contact-details">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <h6>Address</h6>
                                    <p> Oyo State College of Nursing and Midwifery
                                        <br> Eleyele, IB
                                        <br> Oyo state</p>
                                    </div>
                                    <br>
                                    <div class="contact-details">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <h6>Email</h6>
                                        <p>info@oysconme.edu.ng
                                            <br> admin@oysconme.edu.ng
                                        </p>
                                    </div>
                                    <br>
                                    <div class="contact-details">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h6>phone</h6>
                                        <p>+2348</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="contact-center">OR</p>
                </div>
            </div>
        </div>
        <!-- Google map will appear here! Edit the Latitude, Longitude and Zoom Level below using data-attr-*  -->
        <div id="map" data-lat="40.674" data-lon="-73.945" data-zoom="12"></div>
    </section>
@stop
