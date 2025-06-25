<head>
    <title>Admin::@yield('admin-title')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/Oysconmetrans.png')}}" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="/dashboard/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/dashboard/css/font-awesome.css" />
    <link rel="stylesheet" href="/dashboard/css/jquery.jscrollpane.css" />
    <link rel="stylesheet" href="/dashboard/css/jquery.gritter.css">
    <link rel="stylesheet" href="/dashboard/css/jquery-ui.css">
    <link rel="stylesheet" href="/dashboard/css/unicorn.css" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <style>
    .settings-table {
        background-color: #a39d9d;
        font-size: 13px;
        width: auto;
        max-width: 600px;
        margin: 15px auto;
        border-collapse: collapse;
        color: #000;
    }

    .settings-table th,
    .settings-table td {
        padding: 2px 5px;
        border: 1px solid #ccc;
        vertical-align: middle;
    }

    .settings-table input[type="text"] {
        font-size: 13px;
        padding: 3px 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .settings-table th {
        background-color: #8d8787;
        text-align: left;
    }
</style>
    @yield('admin.styles')
</head>
