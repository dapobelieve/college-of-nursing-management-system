@extends('admin.layout.template')

@section('admin-title')
    Create Post
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Create Post</h1>
            <div class="btn-group">
                <a href="/admin/news" class="btn btn-large" title="News"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/news" title="Go to News" class="tip-bottom">News</a>
            <a href="/admin/create-post" class="current">Create Post</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon">
                                <i class="fa fa-align-justify"></i>
                            </span>
                            <h5>Create New Post</h5>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal ajax-form" action="/admin/create-post" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Post Title" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="content" rows="10" class="form-control" placeholder="Post Content" required></textarea>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
