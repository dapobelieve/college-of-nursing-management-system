@extends('admin.layout.template')

@section('admin-title')
    Fees
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Fees</h1>
        </div>
        <div id="breadcrumb">
            <a href="{{route('dashboard.home')}}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
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
                    @if($fees->count())
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Department</th>
                            <th>Level</th>
                            <th>Indigene</th>
                            <th>Non-Indigene</th>
                            <th>Expiry Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($fees as $data)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$data->department->name}}</td>
                                    <td>{{$data->level}}</td>
                                    <td>N{{$data->indigene}}</td>
                                    <td>N{{$data->non_indigene}}</td>
                                    <td>{{date("Y-m-d", strtotime($data->expiry_date))}}</td>
                                    <td>
                                        <a href="{{route('fees.edit', ['fee' => $data->id])}}">Edit</a> |
                                        <form style="display: inline" id="fee-{{$data->id}}" method="post"
                                            action="{{route('fees.destroy', ['fee' => $data->id])}}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{csrf_field()}}
                                        </form>
                                        <a onclick="event.preventDefault();
if (confirm('Are you sure you want to delete this record?')) document.getElementById('fee-{{$data->id}}').submit()" href="{{route('fees.destroy', ['fee' => $data->id])}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $fees->links() }}
                    @else
                        <div class="p-5 text-center">
                            <p class="lead">No Fees!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
