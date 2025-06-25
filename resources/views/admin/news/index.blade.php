@extends('admin.layout.template')

@section('admin-title')
    News
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>News</h1>
            <div class="btn-group">
                <a href="{{route('news.create')}}" class="btn btn-large" title="Create Post"><i class="fa fa-pencil"></i></a>
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
                            @if ($posts->total() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Date Posted</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>---</td>
{{--                                                <td>{{ $post->author->name }}</td>--}}
                                                <td class="text-center">{{ $post->created_at->format('M d, Y') }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/news/{{ $post->id }}/edit" class="btn btn-default btn-sm">Edit</a>
                                                    <a href="{{ route('news.destroy', $post->id)}}" class="btn @if ($post->status == 'active') btn-danger @else btn-success @endif btn-sm">@if ($post->status == 'active') Delete @else Unmute @endif</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $posts->links() }}
                            @else
                                <div class="p-5 text-center">
                                    <p class="lead">0 posts found!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
