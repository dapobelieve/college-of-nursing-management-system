@extends('admin.layout.template')
@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>News</h1>
            <div class="btn-group">
                <a class="btn btn-large" title="Create Post"><i class="fa fa-pencil"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/news" class="current">News</a>
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
                            <h5>News</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ ' ' }}</td>
                                            <td class="text-center">{{ ' ' }}</td>
                                            <td class="text-center">
                                                <a href="/admin/edit-post/{{ ' ' }}" class="btn btn-default btn-sm">Edit</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
