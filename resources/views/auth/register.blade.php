@extends('layouts.app')

@section('title')
  Register - Portal
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @if(Session::has('status'))
            <div>{{Session::get('status')}}</div>
            @endif
            <div class="card">
                <div class="card-header text-center bg-dark text-white">{{ __('Student Portal Registration') }}</div>

                <div class="card-body">
                    <form method="POsT" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                              <div class="col-md-6">
                                  <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                                  @error('lastname')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" >

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                            <div class="col-md-6">
                                <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') }}" required autocomplete="name">

                                @error('middlename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('DoB') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>

                            <div class="col-md-3">
                              <select class="form-control" id="sex" name="sex" required>
                                <option value=""> </option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>

                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pin" class="col-md-4 col-form-label text-md-right">{{ __('Pin') }}</label>

                            <div class="col-md-6">
                                <input id="pin" type="pin" class="form-control @error('pin') is-invalid @enderror" name="pin" required placeholder="provide scratch-card pin">

                                @error('pin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                  <small id="passwordHelpInline" class="text-muted">
                                    Must be atleast 8 characters long.
                                  </small>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="Phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Permanent Address') }}</label>
                              <div class="col-md-6">
                                <textarea id="address" rows="2" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Address') }}</label>
                              <div class="col-md-6">
                                <textarea id="address" rows="2" class="form-control " name="notneccessary" value="" placeholder="optional"></textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('State of Origin') }}</label>

                            <div class="col-md-3">
                              <select class="form-control" onchange="getLga(event)" id="state" name="state" required>
                                <option selected value="">Select</option>
                                @foreach ($states as $state => $value)
                                  <option value="{{$value->id}}"> {{$value->name}}</option>
                                @endforeach
                              </select>
                            </div>


                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('LGA') }}</label>

                            <div class="col-md-3">
                              <select class='form-control' id='lga1' name='lga' required>
                              </select>
                            </div>
                        </div>
                          <script>
                              function getLga(event)
                              {
                                  event.preventDefault();
                                  let stateId = event.target.value;
                                  fetch(`api/get-location/${stateId}`, {
                                      method: 'GET'
                                  })
                                      .then(response => response.json())
                                      .then(data => {
                                          let select = document.getElementById('lga1');
                                          data.forEach((ele) => {
                                              let op = document.createElement('option');
                                              op.appendChild(document.createTextNode(ele.lga));
                                              op.setAttribute('value', ele.id);
                                              select.appendChild(op);
                                          })
                                      });
                              }
                          </script>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">

                      </div>
                      <div class="col-md-6">
                        <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Portal Registration') }}
                            </button>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div id="use">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    @if(Session::has('status'))
        toastr.success("the need to be the best");
    @endif

</script>
@endsection
