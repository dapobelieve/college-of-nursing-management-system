@extends('admin.layout.template')

@section('admin-title')
    Register Student
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Register Student</h1>
        </div>
        <div id="breadcrumb">
            <a href="{{route('dashboard.home')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('students.create')}}" class="current">Student</a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-content">
                            <span>
                                @foreach($errors->all() as $error)
                                    <strong style="color: red">*{{ $error }}</strong> <br>
                                @endforeach
                                @if(Session::has('error'))
                                    <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                @endif
                            </span>
                            <div class="row">
                                @if(Session::has('success'))
                                    <strong style="color: green">* {{ Session::get('success') }}</strong>
                                @endif
                                    <form style="display: grid; grid-template-columns: 1fr 1fr" method="post" action="{{route('students.store')}}" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">First Name:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input required id="first_name" value="{{ old('first_name') }}" type="text" placeholder="First Name" name="first_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Middle Name:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="last_name" value="{{ old('middle_name') }}" type="text" placeholder="Middle Name" name="middle_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Last Name:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="last_name" value="{{ old('last_name') }}" type="text" placeholder="Last Name" name="last_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Sex</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="sex" id="">
                                                        <option selected value="">Select Gender</option>
                                                        <option value="MALE">Male</option>
                                                        <option value="FEMALE">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Level</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="level" id="">
                                                        <option selected value="">Select Level</option>
                                                        <option value="100">100</option>
                                                        <option value="200">200</option>
                                                        <option value="300">300</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Phone Number:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="phone" value="{{ old('phone') }}" type="text" placeholder="Phone Number" name="phone" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Date of Birth:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="dob" value="{{ old('dob') }}" type="date"  name="dob" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <input type="hidden" name="role" value="3">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Matric No:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="rank" value="{{ old('matric_no') }}" type="text" placeholder="Matric number" name="matric_no" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's name:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="password" value="{{ old('sponsors_name') }}"  type="text" placeholder="Sponsor"        name="sponsors_name" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's phone:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="password" value="{{ old('sponsor_phone') }}"  type="text" placeholder="phone number"        name="sponsors_phone" class="form-control input-sm" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                          <div class="form-group">
                                              <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Admission No.:</label>
                                              <div class="col-sm-9 col-md-6 col-lg-6">
                                                  <input id="password" value="{{ old('admission_no') }}"  type="text" placeholder="Provide Admission number"   name="admission_no" class="form-control input-sm" />
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label for="index_no" class="col-sm-3 col-md-3 col-lg-2 control-label">{{ __('Marital Status') }}</label>

                                              <div class="col-sm-9 col-md-6 col-lg-6">
                                                <select class="form-control" value="{{ old('marital_status') }}" id="marital_sta" name="marital_status" required>
                                                  <option value=""> </option>
                                                  <option value="Single">Single</option>
                                                  <option value="Married">Married</option>
                                                </select>
                                              </div>
                                          </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Email:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="email" value="{{ old('email') }}" type="text" placeholder="Email Address"  name="email" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Password:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="password" value="{{ old('password') }}"  type="password" placeholder="Password"        name="password" class="form-control input-sm" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">State</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select onchange="getLga(event)" class="form-control input-sm" name="state" id="">
                                                        <option selected value="">Select</option>
                                                        @foreach($states as $dep)
                                                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">LGA</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" required name="lga" id="lga"></select>
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
                                            <div class="form-group">
                                                <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Department</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <select class="form-control input-sm" name="department" id="">
                                                        <option selected value="">Select</option>
                                                        @foreach($departments as $dep)
                                                            <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Address:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <textarea name="address" id="" cols="30" rows="6"
                                                              class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">City:</label>
                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="password" value="{{ old('city') }}"  type="text" placeholder="city"        name="city" class="form-control input-sm" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                          <div class="col">
                                            <div class="form-group row">
                                                <label for="dob" class="col-sm-3 col-md-3 col-lg-2 control-label">{{ __('Passport Upload') }}</label>

                                                <div class="col-sm-9 col-md-6 col-lg-6">
                                                    <input id="pport_upload" type="file" accept="image/x-png,image/jpeg" class="form-control @error('pport_upload') is-invalid @enderror" name="pport_upload" value="{{ old('pport_upload') }}" required>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="col">

                                          </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

@stop
