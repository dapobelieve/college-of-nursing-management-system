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
