<?php
use App\Models\State;

 ?>
@extends('admin.layout.template')

@section('admin-title')
  Approved Applicants
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Approved Applicants</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="{{route('applicants.index')}}" class="current">applicants</a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
              <div class="col-xs-6">
                <form class="form-inline">
                  @csrf
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control  @error('user') is-invalid @enderror" value="{{ old('user') }}" name="user" placeholder="Search by Email/Reg No." required>
                    @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                <!--   <input class="btn btn-primary mb-2" type="submit" value="Submit">-->
                 <button type="submit"  id="studentapproved" class="btn btn-primary btn-sm mb-2" title="Search applicant(s) that have successfully made form payment">Search Approved applicants</button>
                </form>
              </div>

              <div class="col-xs-6">
                <form class="form-inline" method="get" action="{{route('applicants.searchunapproved')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control  @error('user') is-invalid @enderror" value="{{ old('user') }}" name="user" placeholder="Search by Email/Reg No." required>
                    @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary btn-sm" title="search applicant(s) that are yet to make form payment">Search Unapproved applicants</button>
                </form>
              </div>

                <div class="col-xs-12">

                    @if($applicant->count())
                    <table id="clear2" class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Reg_no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sponsor's Phone</th>
                            <th>Address</th>
                            <th>State of origin</th>
                            <th>Admission status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="justclear" style="font-size: 0.7em;">
                            @foreach($applicant as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->cardapplicant->reg_no}}</td>
                                    <td>{{$data->surname." ".$data->first_name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->sponsor_phone}}</td>
                                    <td>{{$data->home_address}}</td>
                                    <td>
                                      <span class="badge {{ $data->state ? 'badge-info' : 'badge-secondary' }}">
                                        {{ $data->state->name ?? '...' }}
                                    </span>
                                    </td>
                                    <td>
                                      <span class="badge {{ $data->admission_status === 'NO' ? 'badge-danger' : 'badge-success' }}"
                                          title="{{ $data->admission_status === 'NO' ? 'No admission' : 'Admitted' }}">
                                        {{ $data->admission_status === 'NO' ? 'NOT YET' : $data->admission_status }}
                                    </span>
                                    </td>
                                    <td>
                                      @if (Gate::allows('add-applicant-score'))
                                      <a href="{{route('applicants.editapplicant', ['studentapplicant' => $data->id])}}" title="Edit student Details">Edit</a> |  <a href="{{route('applicants.edit', ['studentapplicant' => $data->id])}}" class="btn btn-primary btn-xs" title="add score and admission status">Add Score</a>
                                      @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Applicants!</p>
                        </div>
                    @endif
                    <div id="justclear2">{{$applicant->links()}}</div>
                </div>

                @if (Gate::allows('delete-all-applicants'))
                  <div class="col-xs-12">
                    <label class="text text-danger">*Do not delete until admission process is finished*</labe>
                  </div>
                  <div class="col-xs-8">
                    <form class="form-inline" method="post" action="{{ route('applicants.deleteall') }}" enctype="multipart/form-data">
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
                      <button type="submit" class="btn btn-primary btn-sm mb-2" title="Delete all applicants in the database">Truncate DataTable</button>
                    </form>
                  </div>
                @endif

                <div class="col-xs-2">
                  <form class="form-inline" method="post" action="{{route('applicants.exportcsv')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4">
                    <button type="submit" class="btn btn-success btn-xs mb-2" title="Export approved applicants information">Export excel file</button>
                  </form>
                </div>
            </div>

                <div class="col-xs-2">
                    <div class="form-group mb-4">
                      <div class="btn-group dropup">
										 <button data-toggle="dropdown" class="btn btn-success btn-xs mb-2 dropdown-toggle" title="Generate applicant's examination list"><i class="fa fa-user icon-white"></i> Generate PDF <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-primary">
                      @php
                      $ins = ceil($count/359);
                      @endphp
                      @for ($i=0; $i < $ins; $i++)
											<li><a href="{{route('applicants.downloadPDF', ['page' => $i])}}"><i class="fa fa-print"></i> page {{$i+1}}</a></li>
                      @endfor
											<li class="divider"></li>
											<li><a href="#"><i class="i"></i>359 candidates/page</a></li>
										</ul>
									</div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop

@section('admin.scripts')
  $("#studentapproved").click(function(e){
    e.preventDefault();
    var user = $("input[name=user]").val();

    var url = "{{ route('applicants.search')}}";
    $(this).prop("disabled", true);
    $.ajax({
      type: "POST",
      url: url,
      data:{user:user,  "_token": "{{ csrf_token() }}"},
      success: function(data){

        $('#justclear').empty();
        $('#justclear2').empty();
        if(data != false){
        var newurl="{{route('applicants.editapplicant', ['studentapplicant' => 'studentapplicant'])}}";
        newurl = newurl.replace("studentapplicant", data.id);
        var edit = "<a href="+newurl+" title='Edit student Details'>Edit</a>";
        var mark = "<tr><td>"+data.id+"</td><td>"+data.reg_no+"</td><td>"+data.surname+"</td><td>"+data.email+"</td><td>"+data.phone+"</td><td>"+data.sponsor_phone+"</td><td>"+data.home_address+"</td><td><span class='badge badge-success'>"+data.state.name+"</span></td><td>"+data.admission_status+"</td><td>"+edit+"</td></tr>";
        $('#justclear').append(mark);
        //alert(data.biology);
      }else{
        $('#justclear').append("<b>NO registration number or email address present</b>");
      }
      }
      }); $(this).prop("disabled", false);
  });



@endsection
