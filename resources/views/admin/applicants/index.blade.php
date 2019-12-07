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
              <div class="col-xs-10">
                <form class="form-inline" method="post" action="{{route('applicants.search')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control  @error('user') is-invalid @enderror" value="{{ old('user') }}" name="user" placeholder="Search by Registration No." required>
                    @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary mb-2">Search</button>
                </form>
              </div>

                <div class="col-xs-12">

                    @if($applicant->count())
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th></th>
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
                            @foreach($applicant as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->cardapplicant->reg_no}}</td>
                                    <td>{{$data->surname." ".$data->first_name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->sponsor_phone}}</td>
                                    <td>{{$data->home_address.", ".$data->address_state}}</td>
                                    <td><span class="badge badge-success">{{$data->state_of_origin}}</span></td>
                                    @if($data->admission_status == "NO")
                                    <td><span class="badge badge-danger">NOT YET</span></td>
                                    @else
                                    <td><span class="badge badge-success">{{$data->admission_status}}</span></td>
                                    @endif
                                    <td><a href="{{route('applicants.edit', ['studentapplicant' => $data->id])}}" class="btn btn-primary btn-sm">Add Score</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Cards!</p>
                        </div>
                    @endif
                    {{$applicant->links()}}
                </div>
                <div class="col-xs-12">
                  <label class="text text-danger">*Do not delete until admission process is finished*</labe>
                </div>
                <div class="col-xs-10">
                  <form class="form-inline" method="post" action="{{route('applicants.deleteall')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                      <label for="inputPassword2" class="sr-only">Password</label>
                      <input type="hidden" name="_method" value="PUT">
                      <input type="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Provide Password" required>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Truncate DataTable</button>
                  </form>
                </div>
                <div class="col-xs-2">
                  <form class="form-inline" method="post" action="{{route('applicants.exportcsv')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                    <button type="submit" class="btn btn-success mb-2">Export excel file</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
