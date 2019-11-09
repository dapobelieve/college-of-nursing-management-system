@extends('admin.layout.template')

@section('admin-title')
    Admins    
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Admins</h1>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/admins" class="current">Admins</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-th"></i>
                            </span>
                            <h5>Admins</h5>
                        </div>
                        <div class="widget-content nopadding">
                            @if ($admins->total() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->user->name }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/view-admin/{{ $admin->id }}" class="btn btn-default btn-sm">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $admins->links() }}
                            @else
                                <div class="p-5 text-center">
                                    <p class="lead">0 admins found!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
