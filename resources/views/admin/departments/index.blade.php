@extends('admin.layout.template')
@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Departments</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current"></a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col-xs-12">
                    {{--                    @if($transactions->count())--}}
                    <table class="table table-bordered table-striped table-hover data-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>from</th>
                            <th>to</th>
                            <th>amount</th>
                            <th>status</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                            @foreach($transactions as $data)--}}

                        {{--                            @endforeach--}}
                        </tbody>
                    </table>
                    {{--                    @else--}}
                    <p>No Transactions for this wallet yet</p>
                    {{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>

@stop
