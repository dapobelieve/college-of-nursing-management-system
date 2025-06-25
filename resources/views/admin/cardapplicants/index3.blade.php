@extends('admin.layout.template')

@section('admin-title')
    Cards
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Applicant's Cards</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current"></a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">

                <div class="col-xs-12">
                    @if(Session::has('success'))
                        <div class="alert alert-info">
                            {{Session::get('success')}}
                            <a href="#" data-dismiss="alert" class="close">×</a>
                        </div>
                    @endif
                    @if($cards->count())
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>serial_no</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cards as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->reg_no}}</td>
                                    <td><span class="badge badge-primary">NOT USED</span></td>
                                    <td><span class="badge badge-primary">No Action</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Cards!</p>
                        </div>
                    @endif
                    {{$cards->links()}}
                </div>
                <div class="col-xs-12">
                  <form class="form-inline" method="post" action="{{route('cardapplicants.exportcsv')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2">
                      <label for="inputPassword2" class="sr-only">Password</label>
                      <input type="password" class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" placeholder="Provide Password" required>
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Export Unused Card</button>
                  </form>
                </div>
            </div>
        </div>
    </div>

@stop
