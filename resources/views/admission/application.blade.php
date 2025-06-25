@extends('admission.app')

@section('title')
Admission - Form one
@endsection
@section('content')

<section class='admission_form'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12 my-5'>
                        <h2>Application for Admission - Step One</h2>
                    </div>

                </div>
                <span>
                    @foreach($errors->all() as $error)
                        <strong style="color: red">*{{ $error }}</strong> <br>
                    @endforeach
                    @if(Session::has('error'))
                        <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                    @endif
                </span>
                <form class="form-horizontal" action="{{route('application.store', ['studentapplicant' => $student->id])}}" method="get">
                  @csrf
                        <div class='row'>
                            <div class='col-md-6'>
                              <div class='row form-group'>
                                  <div class='col-lg-4'>
                                      <label>
                                          Surname</label>
                                  </div>
                                  <div class='col-lg-8'>
                                      <input type='text' name='surname'  value="{{$student->surname }}" class='form-control' required readonly>
                                  </div>
                              </div>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            First name</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='first_name'  value="{{$student->first_name }}" class='form-control' required readonly>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Middle name</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='middle_name'  value="" class='form-control'>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Email address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='email' name='email' placeholder="email address"  value="{{$student->email}}" class='form-control' readonly required>
                                    </div>
                                </div>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Phone</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='text' name='phone' placeholder="phone number" class='form-control'  value="{{ $student->phone }}" readonly required>
                                    </div>
                                </div>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Date of birth </label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <input type='date' name='dob' class='form-control'  value="{{date("Y-m-d", strtotime($student->dob))}}" required>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Address</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <div class='form-group'>
                                          <textarea class="form-control" name="home_address" rows="3"  value="{{ old('home_address') }}" required></textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class='col-md-6'>
                              <div class='row form-group'>
                                  <div class='col-lg-4'>
                                      <label>
                                          city of residence</label>
                                  </div>
                                  <div class='col-lg-8'>
                                      <div class='form-group'>
                                          <input type='text' name='state' class='form-control'  value="{{ old('state') }}" placeholder='Your present city' required>
                                      </div>
                                  </div>
                              </div>




                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            State of Origin</label>
                                    </div>
                                    <div class='col-lg-8'>

                                        <select onchange="getLga(event)" class="form-control input-sm" name="state_of_origin" id="" required>
                                            <option selected value="">Select</option>
                                            @foreach($states as $dep)
                                                <option value="{{$dep->id}}">{{$dep->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class='row form-group'>
                                      <div class='col-lg-4'>
                                          <label>
                                              LGA</label>
                                      </div>
                                      <div class='col-lg-8'>
                                          <div class='form-group'>
                                              <select class="form-control input-sm" required placeholder="local government area" name="lga" id="lga"></select>
                                          </div>
                                      </div>
                                  </div>
                                  <script>
                                      function getLga(event)
                                      {
                                          event.preventDefault();
                                          let stateId = event.target.value;
                                          fetch(`/api/get-location/${stateId}`, {
                                              method: 'GET'
                                          })
                                              .then(response => response.json())
                                              .then(data => {
                                                  let select = document.getElementById('lga');
                                                  select.innerHTML = "";
                                                  data.forEach((ele) => {
                                                      let op = document.createElement('option');
                                                      op.appendChild(document.createTextNode(ele.lga));
                                                      op.setAttribute('value', ele.id);
                                                      select.insertAdjacentElement('beforeend', op);
                                                  })
                                              });
                                      }
                                  </script>

                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Gender</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='gender' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='male'>Male</option>
                                            <option value='female'>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Religion</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='religion' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='christianity'>Christianity</option>
                                            <option value='islam'>Islam</option>
                                            <option value='other'>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row form-group'>
                                    <div class='col-lg-4'>
                                        <label>
                                            Marital Status</label>
                                    </div>
                                    <div class='col-lg-8'>
                                        <select class='form-control custom-select' name='marital_status' required>
                                            <option selected='' value=''>Select</option>
                                            <option value='single'>Single</option>
                                            <option value='married'>Married</option>
                                            <option value='divorced'>Divorced</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-12 text-center'>
                                <button type='submit' onclick="myFunction()" class='btn btn-default btn-courses mt-4' id='js-admission-btn'>Save</button>
                                <script>
                                function myFunction() {
                                  var txt;
                                  if (confirm("You are about to save, Are you sure?")) {
                                    return true;
                                  } else {
                                    return false;
                                  }

                                }
                                    </script>
                            </div>
                        </div>
                    </form>
					<div class='row'>
						<div class='col-md-12 text-center'>
						<!--<button class='btn btn-default mt-4' id='js-admission-2'>Proceed</button>-->
						</div>
					</div>
                </div>
            </section>

@stop
@section('script')

@stop
