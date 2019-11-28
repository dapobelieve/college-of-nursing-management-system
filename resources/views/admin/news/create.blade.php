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
                            <form class="form-horizontal ajax-form" action="{{route('news.store')}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="form-group">
                                    <input type="text" autofocus name="title" class="form-control" placeholder="Post Title" required>
                                </div>
                                <input type="hidden" name="postBody">
                                <div class="form-group">
                                    <div id="toolbar-container"></div>
                                    <div style="height: 200px" id="smseditor"></div>
                                </div>
                                <div>
                                    <button  type="submit" class="btn btn-primary">Save</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script>

        let toolbarOptions = [
            ['bold', 'italic', 'blockquote', 'underline', 'link', 'image'],
            [{'header': 1}, {'header': 2}],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        ];

        //initialize editor
        var quill = new Quill('#smseditor', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: "Write a story..."
        });

        // fix pasting issues
        quill.clipboard.addMatcher (Node.ELEMENT_NODE, function (node, delta) {
            var plaintext = node.innerText;
            var Delta = Quill.import('delta');
            return new Delta().insert(plaintext);
        });


        let form = document.querySelector('form');
        form.addEventListener('submit', showHtml);
        function showHtml(event)
        {
            event.preventDefault();
            let title = document.querySelector('input[name=title]').value;
            let body = quill.root.innerText;
            let richBody = quill.root.innerHTML;

            // let post = document.querySelector('input[name=postBody]');
            // post.value = JSON.stringify(quill.getContents());
            // console.log("Submitted", form.serialize(), form.serializeArray());

            axios.post('/admin/news', {
                title,
                body,
                richBody
            })
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => {
                    console.log(error.response)
                })
        }
    </script>
    <!-- Initialize Quill editor -->
@stop
