<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Important News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-secondary alert-dismissible fade show text-black" role="alert">
              <h5 class="alert-heading">Advertisement for Admission into Basic General Nursing and Post Basic Midwifery Programmes
                of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan for 2020/2021 Academic Session</h5>
              <p>Applications are hereby invited from suitably qualified candidates for admission
                 into the following programmes of Oyo State College of Nursing and Midwifery, Eleyele, Ibadan.</p>
          <ul>
            <li>Basic General Nursing</li>
            <li>Post-Basic Midwifery</li>
          </ul>
          <Strong class="mb-0">Note: No payment to any Individual/Agent or Personal Bank Account.
            All payment should be done via the school website</strong>
                <a href="{{url('/admission')}}">Click here for more information</a>
              </div>
          </div>

          <div class="col-md-12">
            <div class="alert alert-secondary alert-dismissible fade show text-black" role="alert">
              <h5 class="alert-heading">2020 ENTRANCE EXAMINATION RESULT OF THE SCHOOL OF BASIC MIDWIFERY, KISHI</h5>
              <p>The listed candidates who were at the recently conducted entrance examination and interview into the School
                of Basic Midwifery, Kishi have been offered Admission into Basic Midwifery programme of the Institution</p>
          <ul>
            <li> <a href="{{url('/admission/shortlist')}}">click here</a> for more information </li>
          </ul>
          <Strong class="mb-0">The resumption date for the Basic Midwifery Programme is Sunday, 1st March, 2020. Successful candidates who are on the merit list are to report at the office of the Registrar, Oyo State College of Nursing and Midwifery, Eleyele, Ibadan from 8:00am to 4:00pm to collect their admission letter, but must have paid the sum of Fifteen
            Thousand Naira (N15,000:00) only as Acceptance Fee via this <a href="{{url('/admission/login')}}">link</a></strong>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="header-topbar">
    <div class="container">
      <!---- start of alert view -->


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
