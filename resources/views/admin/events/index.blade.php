@extends('admin.layout.template')

@section('admin-title')
    Events
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Events</h1>
            <div class="btn-group">
                <a href="{{route('news.create')}}" class="btn btn-large" title="Create Post"><i class="fa fa-pencil"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/events" class="current">Events</a>
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
                        <?php use Carbon\Carbon; ?>
                        <div class="widget-content nopadding">
                            @if ($posts->total() > 0)
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date Posted</th>
                                            <th>Event date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td class="text-center">{{ $post->created_at->format('M d, Y') }}</td>
                                                <td class="text-center">{{ date("M d, Y", strtotime(Carbon::parse($posts[0]->expiry_date))) }}</td>
                                                <td class="text-center">
                                                    <a href="/admin/events/{{ $post->id }}/edit" class="btn btn-default btn-sm">Edit</a>
                                                    <button class="btn @if ($post->expiry_date < date('d-m-y') ) btn-danger @else btn-success @endif btn-sm">@if ($post->expiry_date < date('d-m-y')) Mute @else Unmute @endif</button>
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
