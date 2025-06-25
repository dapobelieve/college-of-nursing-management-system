@extends('admin.layout.template')

@section('admin.styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@stop

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
            <a href="/admin/news/{{$post->id}}/edit" class="current">Edit Post</a>
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
                            <form class="form-horizontal>
                                {{ csrf_field() }}
                                {{ method_field('POST') }}

                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Post Title" value="{{$post->title}}" required>
                                </div>
                                
                                <input type="hidden" name="postBody">
                                <input type="hidden" id="recievebody" name="body">
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <div id="toolbar-container"></div>
                                    <div style="height: 200px" id="smseditor">{{$post->body}}</div>
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

@section('admin.scripts')
</script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script>

        let toolbarOptions = [
            ['bold', 'italic', 'blockquote', 'underline', 'link', 'image'],
            [{'header': 1}, {'header': 2}, {'header': 3}],
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

            let formData = new FormData();
            formData.append('title', title);
            formData.append('body', body);
            formData.append('richBody', richBody);
            formData.append("_method", "put");
            //let body input recieve value
            //$('#recievebody').val(body);
            axios.post('/admin/news/{{$post->id}}', formData, {
                headers: {
                    data: $(this).serialize(),
                    "Content-type": "multipart/form-data"
                }
            })
            .then(response => {
                console.log(response.data.message)
                switch (response.data.ok) {
                  case true:
                    toastr.success(response.data.message);
                    var url = "{{ route('news.index')}}";
                    window.location.replace(url);
                    break;
                  default:
                  toastr.error(response.data.message);
                  break;

                }

            })
            .catch(error => {
                console.log(error.response)
            })
        }
    </script>
    <!-- Initialize Quill editor -->
@stop
