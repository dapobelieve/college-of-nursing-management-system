@extends('admin.layout.template')

@section('admin-title')
    Edit Lecturer | {{ $lecturer->user->first_name." ".$lecturer->user->last_name }}
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Lecturers</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current"></a>
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
                                <form style="display: grid; grid-template-columns: 1fr 1fr" method="post" action="{{route('lecturers.update', ['lecturer' => $lecturer->id])}}" class="form-horizontal">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">First Name:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input required id="first_name" value="{{ $lecturer->user->first_name }}" type="text" placeholder="First Name" name="first_name" class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Last Name:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="last_name" value="{{ $lecturer->user->last_name }}" type="text" placeholder="Last Name" name="last_name" class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">Sex</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <select class="form-control input-sm" name="sex" id="">
                                                    <option @if($lecturer->user->sex == 'MALE') selected @endif value="MALE">Male</option>
                                                    <option @if($lecturer->user->sex == 'FEMALE') selected @endif value="FEMALE">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Phone Number:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="phone" value="{{ $lecturer->user->phone }}" type="text" placeholder="Phone Number" name="phone" class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Date of Birth:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="dob" value="{{ $lecturer->user->dob }}" type="date"  name="dob" class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" value="2">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Academic Rank:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="rank" value="{{ $lecturer->rank }}" type="text" placeholder="Academic Rank" name="rank" class="form-control input-sm" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Email:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <input id="email" value="{{ $lecturer->user->email }}" type="text" placeholder="Email Address"  name="email" class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">State</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <select onchange="getLga(event)" class="form-control input-sm" name="state_id" id="">
                                                    @foreach($states as $dep)
                                                        <option @if($lecturer->user->state_id == $dep->id) selected @endif value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="hod" class="col-sm-3 col-md-3 col-lg-2 control-label">LGA</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <select class="form-control input-sm" required name="lga" id="lga">
                                                    @foreach($lecturer->user->state->location as $lgas)
                                                        <option @if($lgas->id == $lecturer->location_id) selected @endif value="{{$lgas->id}}">{{ $lgas->lga }}</option>
                                                    @endforeach
                                                </select>
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
                                                <select class="form-control input-sm" name="department_id" id="">
                                                    <option selected value="">Select</option>
                                                    @foreach($departments as $dep)
                                                        <option @if($lecturer->department->id == $dep->id) selected @endif value="{{$dep->id}}">{{$dep->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Address:</label>
                                            <div class="col-sm-9 col-md-6 col-lg-6">
                                                <textarea name="address" id="" cols="60" rows="5" class="form-control">
                                                        {{ $lecturer->user->address }}
                                                </textarea>
                                            </div>
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
