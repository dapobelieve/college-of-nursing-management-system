<style media="screen">
    table, th, td {
              border: 1px solid black;
              border-collapse: collapse;
              }
    </style>

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
                <h4 class="alert-heading text-success text-justify"><b class="text-primary text-uppercase">Commencement of the sales of form for the conduct of Post UTME into the National Diploma in Nursing for the year 2025/2026 Academic Session.</b> <hr></h4>
                <p class="text-success"></p>

                
                <br>
               <a href='/admission/appform'>Click here</a> to buy form</p>

          <ul>
               
         <li>Sales start from: June 15, 2025 till 5th September 2025</li>
          <li>Conduct of Screening Exercise from Tuesday, 16th September to 18th September, 2025</li>
            <li>Resumption Date: 6th October, 2025</li>
          </ul>
          <hr>
              </div>

<!--just to put link to the news on you can clear when the time is right



          <div class="alert alert-secondary alert-dismissible fade show text-black" role="alert">
                <h4 class="alert-heading text-success text-justify"><b class="text-primary">OYO STATE COLLEGE OF NURSING AND MIDWIFERY, ELEYELE, IBADAN.<br>
                        ADMISSION 2024/2025 SESSION<br>
                        OYSCONME COMPUTER ASSITED SCREENING (CAS)
                        </b> <br></h4>
                <p>Applications are invited from suitably qualified candidates for Computer Assisted Screening (CAS), for admission into the National Diploma (ND) Programme at the Oyo State College of Nursing and Midwifery, Eleyele, Ibadan.</p>
                
                <h4 class="text-danger">ENTRY REQUIREMENT:</h4>
                <ul>
                    <li>JAMB: Candidates must ensure to have scored not less than 200 in the 2023 JAMB Result and also must have chosen OYSCONME as their First Choice of Institution.</li>
                    <li>WASSCE/NECO (O’ Level) with credits in five (5) subjects including English Language, Mathematics, Biology, Physics and Chemistry at not more than two (2) sittings.</li>
                </ul>
                <ul>
                    <li class="text-success"><a href='admission'>Click here</a> for more information</li>
                </ul>
          </div>-->


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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
