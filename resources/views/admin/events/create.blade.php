@extends('admin.layout.template')

@section('admin.styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@stop

@section('admin-title')
    Create News
@endsection

@section('admin-content')

    <div id="content">

        <div id="content-header">
            <h1>Create News</h1>
            <div class="btn-group">
                <a href="/admin/news" class="btn btn-large" title="News"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
        <div id="breadcrumb">
            <a href="/admin" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="/admin/news" title="Go to News" class="tip-bottom">News</a>
            <a href="#" class="current">Create News</a>
        </div>
        <div class="container-fluid">
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
                            <form class="form-horizontal">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" autofocus name="title" class="form-control" placeholder="Post Title" required>
                                </div>
                                <div class="form-group">
                                    <label for="image">Display Image</label>
                                    <input id="news-image" accept="image/x-png,image/jpeg" type="file" a class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Event date</label>
                                    <input id="news-date" type="date" name="date" a class="form-control">
                                </div>

                                <input type="hidden" id="recievebody" name="body">
                                <div class="form-group">
                                    <label for="content">Content</label>
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
</script>
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
            let date = document.querySelector('input[name=date]').value;
            let body = quill.root.innerText;
            let image = document.getElementById('news-image').files[0];

            let formData = new FormData();
            formData.append('title', title);
            formData.append('details', body);
            formData.append('date', date);
            formData.append('image', image);

            //let body input recieve value
            //$('#recievebody').val(body);
            axios.post('/admin/events', formData, {
                headers: {
                    "Content-type": "multipart/form-data"
                }
            })
            .then(response => {
                console.log(response.data.message)
                switch (response.data.ok) {
                  case true:
                    toastr.success(response.data.message)
                    var url = "{{ route('events.index')}}";
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
