@extends('welcome')
@section('title', strtoupper(config('site.name.short'))." "." | Contact Us")


@section('pagename')
Contact Us
@stop

@section('site.content')
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Contact Details</h2>
                </div>
            </div>
        </div>
        @if(session()->has('status-contact'))
          <div class="alert alert-success " role="alert">
            {{session()->get('status-contact')}}
          </div>
          <br>
          @endif
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form " style="background-color:#f09ac0;">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 contact-option">
                            <div class="contact-option_rsp">
                                <h3>Leave a message</h3>
                                <form action="{{route('contact')}}" method="post" id="phpcontactform">
                                     @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject" value="{{ old('subject') }}" required>
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- // end .form-group -->
                                    <div class="form-group">
                                        <textarea placeholder="Message" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required rows="5"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                        <br> Eleyele, Ibadan.
                                        <br>PMB 5081 Eleyele Ibadan,
                                        <br>Oyo state, Nigeria</p>
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
                                        <p>+23409138766976 | +2348156903399</p>
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
