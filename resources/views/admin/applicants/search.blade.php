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

                    @if($applicant !==null)
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
                                    <td><span class="badge badge-success">{{$applicant->state_of_origin}}</span></td>
                                    @if($applicant->admission_status == "NO")
                                    <td><span class="badge badge-danger">NOT YET</span></td>
                                    @else
                                    <td><span class="badge badge-success">{{$applicant->admission_status}}</span></td>
                                    @endif
                                    <td><form style="display: inline" id="applicant-{{$applicant->id}}"
                                          method="post"
                                          action="{{route('applicants.destroy', ['studentapplicant' => $applicant->id])}}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{csrf_field()}}
                                    </form>
                                    <a onclick="event.preventDefault();
                                    if (confirm('Are you sure you want to delete this record?')) document.getElementById('applicant-{{$applicant->id}}').submit()" href="{{route('applicants.destroy', ['studentapplicant' => $applicant->id])}}">Delete</a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No student with such registration!</p>
                        </div>
                    @endif
                </div>


        </div>
    </div>
    </div>

@stop
