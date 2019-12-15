<div class="header-topbar">
    <div class="container">
      <!---- start of alert view -->
      <div class="row">
        <div class="col-md-12">
          <div class="alert alert-secondary alert-dismissible fade show text-white" role="alert">
            <h5 class="alert-heading">ADVERTISEMENT FOR COMPETITIVE ENTRY/ADMISSION INTO THE SCHOOL OF BASIC MIDWIVERY, KISHI,
             A SATELLITE CAMPUS OF OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE,
             IBADAN FOR 2020/2021 ACADEMIC SESSION</h5>
            <p>Online application which commences on Monday, 16th December, 2019 must be completed on or before Friday, 31st January, 2020.</p>
        <ul><li>	Date and Venue of Entrance Examination:  Saturday, 1st February, 2020 and will be held simultaneously at:<br>
        a)	School of Basic Midwifery, Kishi, Irepo Local Government<br>
        b)	Oyo State College of Nursing and Midwifery, Eleyele, Ibadan</li>
        <li>	Time:		8:00am prompt <br>
        <b>Date of Resumption:</b> Successful applicants/candidates will resumes on Monday, 2nd March, 2020 for academic activities.</li>

            <Strong class="mb-0">Note: No payment to any Individual/Agent or Personal Bank Account. Pay directly to the
              College Account Number 0123032629 at any Wema Bank Branch and
              obtain the scratch card from the Bursary Department of the College to complete your application ONLINE.</strong>
              <a href="{{url('/admission')}}">Click here for more information</a>
            </div>
        </div>
      </div>

      <!-- end of -->
        <div class="row">
            <div class="col-xs-3 col-sm-5 col-md-6">
                <div class="header-top_address">
                    <div class="header-top_list">
                      <a href="tel:+2347086157620"><span class="icon-phone">+2347086157620</span></a>
                    </div>
                    <div class="header-top_list">
                      <a href="malito:info@oysconme.edu.ng"><span class="icon-envelope-open">info@oysconme.edu.ng</span></a>
                    </div>
                    <div class="header-top_list">
                      <a href="http://maps.google.com/?q=Oyo%20state%20college%20of%20nursing%20&%20midwifery"><span class="icon-location-pin">Eleyele, Ibadan Oyo state</span></a>
                    </div>
                </div>

                <div class="header-top_login2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/portal/dashboard') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="col-xs-3 col-sm-5">
              @if($news != null)
              <a href="{{route('latestNews', ['id'=>$news->id, 'info'=>$news->title])}}">
              <h6 id="hhh" class="movedisplay dis text-white">{{$news->title}} <span class="badge badge-info">Click</span></h6></a>
              @endif
            </div>
            <div class="col-xs-3 col-sm-2 col-md-1" id="zinde">
                <div class="header-top_login mr-sm-3">
                    @if (Route::has('login'))
                        @auth
                            {{--                                  <a href="{{ url('/home') }}">Home</a>--}}
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
