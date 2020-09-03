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
                <h4 class="alert-heading text-primary text-justify"><b class="text-danger">PUBLIC NOTICE!!!</b> <hr>
    This is to inform the General Public that the date of Entrance Examination into Oyo State College of Nursing and Midwifery, Eleyele Ibadan has been postponed indefinitely due to COVID-19 Pandemic until the Oyo  State Government announces the re-opening  of Tertiary Institutions.<br>
Thank you!!!<br>
Signed.<br>
Management .</h4>

    <hr>
              <h5 class="alert-heading text-center text-danger">OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN <br>INTERNAL AND EXTERNAL ADVERTISEMENT OF VACANCIES.
</h5>
              <p class="text-primary">Sequel to the approval of His Excellency, the Governor, Engr. Seyi Makinde, the Management of Oyo State College of
                Nursing and Midwifery hereby announces the process of filling the following vacant positions of Tutors
                 and Administrative staff. Applications are therefore invited from suitably qualified candidates who meet
                 the criteria. Kindly click the <a href="{{asset('/job-guide')}}">HERE</a> to know more</p>

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
