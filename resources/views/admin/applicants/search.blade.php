@extends('admin.layout.template')

@section('admin-title')
  Applicants
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Applicants</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('applicants.index')}}" class="current">applicants</a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
              <div class="col-xs-12">

                    @if($applicant != null)
                    @if($tag == 'unapproved')
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th class="col-sm-2">Name</th>
                            <th class="col-sm-2">Email</th>
                            <th class="col-sm-2">Phone</th>
                            <th class="col-sm-2">Date of Birth</th>
                            <th class="col-sm-5">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$applicant->metadata}}</td>
                                    <td>{{$applicant->email}}</td>
                                    <td>{{$applicant->phone}}</td>
                                    <td>{{date("d-M-Y", strtotime($applicant->dob))}}</td>
                                    <td><div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" placeholder="Pay application form for applicant">
                                        Pay for Applicant
                                      </button>
                                      <div class="dropdown-menu">
                                        <form class="px-4 py-3" method="post" action="{{route('applicants.manualpay')}}" class="form-horizontal">
                                          <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" value="{{$applicant->email}}" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleDropdownFormEmail1">Amount</label>
                                            <input type="text" name="amount" class="form-control" value="" id="exampleDropdownFormEmail1" placeholder="amount paid">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleDropdownFormPassword1">Password</label>
                                            <input type="text" name="reference" class="form-control" id="exampleDropdownFormPassword1" placeholder="reference">
                                            <input type="hidden" name="id" value="{{$applicant->id}}">
                                          </div>
                                          <button type="submit" class="btn btn-primary">Pay</button>
                                          {{ csrf_field() }}
                                        </form>

                                      </div>
                                    </div></td>

                                </tr>
                        </tbody>
                    </table>
                      @else
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th>Reg_no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sponsor's Phone</th>
                            <td>Address</td>
                            <th>State of origin</th>
                            <th>Admission status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$reg_no}}</td>
                                    <td>{{$applicant->surname." ".$applicant->first_name}}</td>
                                    <td>{{$applicant->email}}</td>
                                    <td>{{$applicant->phone}}</td>
                                    <td>{{$applicant->sponsor_phone}}</td>
                                    <td>{{$applicant->home_address.", ".$applicant->address_state}}</td>
                                    <td><span class="badge badge-success">{{$applicant->state->name ?? "NOT YET"}}</span></td>
                                    @if($applicant->admission_status == "NO")
                                    <td><span class="badge badge-danger" title="No admission">NOT YET</span></td>
                                    @else
                                    <td><span class="badge badge-success" title="admitted">{{$applicant->admission_status}}</span></td>
                                    @endif
                                    @if($tag == 'approved')
                                    <td><form style="display: inline" id="applicant-{{$applicant->id}}"
                                          method="post"
                                          action="{{route('applicants.destroy', ['studentapplicant' => $applicant->id])}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                    </form>
                                    <a href="{{route('applicants.editapplicant', ['studentapplicant' => $applicant->studentapplicant_id])}}" title="Edit student Details">Edit</a> | <a onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete this record?')) document.getElementById('applicant-{{$applicant->id}}').submit()" href="{{route('applicants.destroy', ['studentapplicant' => $applicant->studentapplicant_id])}}">Delete</a>
                                    </td>
                                    @else
                                    <td><a href="{{route('applicants.addtelleredit', ['studentapplicant' => $studentID])}}" class="btn btn-primary btn-sm " title="Provide teller number for confirmation">Confirm payment</a></td>
                                    @endif
                                </tr>
                        </tbody>
                    </table>
                    @endif
                    @else
                        <div class="p-5 text-center">
                          @if($tag == 'approved')
                            <p class="lead">No student with such Email or Reg No.! or<span class="badge badge-warning">Payment not yet confirmed!! Check unapproved applicant</span></p>
                          @else
                            <p class="lead">No student with such email address! or <span class="badge badge-success">or check approved student <a href="{{route('applicants.index')}}">click here</a></span></p>
                          @endif
                        </div>
                    @endif
                </div>


        </div>
    </div>
    </div>

@stop
