@extends('admin.layout.template')

@section('admin-title')
    Edit Post
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Edit Post</h1>
            <div class="btn-group">
                <a href="/admin/news" class="btn btn-large" title="News"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/news" title="Go to News" class="tip-bottom">News</a>
            <a href="/admin/edit-post/{{$post->id}}" class="current">Edit Post</a>
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
                            <h5>Edit Post</h5>
                        </div>
                        <div class="widget-content">
                            <form class="form-horizontal ajax-form" action="/admin/edit-post/{{$post->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{$post->title}}" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="content" rows="10" class="form-control" placeholder="Post Content" required>{{$post->content}}</textarea>
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
