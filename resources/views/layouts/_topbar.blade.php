<div class="header-topbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-8 col-md-9">
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
            <div class="col-xs-6 col-sm-4 col-md-3" id="zinde">
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
