@extends('admin.layout.template')

@section('admin-title')
    Cards
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Cards</h1>
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
                            <th>By who</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cards as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->serial_no}}</td>
                                    @if($data->status == 'USED')
                                    <td><span class="badge badge-success">{{$data->status}}</span></td>
                                    @else
                                    <td><span class="badge badge-primary">{{$data->status}}</span></td>
                                    @endif
                                    <td>{{$data->matric_no}}</td>
                                    <td>No action</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Cards!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
