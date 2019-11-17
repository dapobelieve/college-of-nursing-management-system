@extends('admin.layout.template')

@section('admin.styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@stop

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
            <a href="#" class="current">Create Post</a>
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
                                    <div id="toolbar-container"></div>
                                    <div style="height: 200px" id="smseditor"></div>
                                </div>

                                <div>
                                    <button  onclick="event.preventDefault(); showHtml()" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('admin.scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>

        let options = [
            ['bold', 'italic', 'blockquote', 'underline', 'link', 'image'],
            [{'header': 1}, {'header': 1}],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ];

        var quill = new Quill('#smseditor', {
            theme: 'snow',
            modules: {
                toolbar: options
            },
            placeholder: "Write a story..."
        });

        function showHtml()
        {
            console.log(quill.root.innerHTML)
        }
    </script>
    <!-- Initialize Quill editor -->
@stop
