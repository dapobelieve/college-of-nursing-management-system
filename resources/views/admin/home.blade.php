@extends('admin.layout.template')
@section('admin-content')

    <div id="content">
        <div id="content-header" class="mini">
            <h1>Dashboard</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current">Dashboard</a>
        </div>
        <div class="container-fluid">
            {{-- @include('admin.layout.stats') --}}
            <br />

            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-info">
                        Welcome in the <strong>Unicorn Admin Theme</strong>. Don't forget to check all the pages!
                        <a href="#" data-dismiss="alert" class="close">×</a>
                    </div>
                    <div class="widget-box">
                        <div class="widget-title">
                            <span class="icon"><i class="fa fa-signal"></i></span>
                            <h5>Site Statistics</h5>
                            <div class="buttons">
                                <a href="#" class="btn"><i class="fa fa-refresh"></i> <span class="text">Update stats</span></a>
                            </div>
                        </div>
                        <div class="widget-content">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <ul class="site-stats">
                                        <li><div class="cc"><i class="fa fa-user"></i> <strong>1433</strong> <small>Total Users</small></div></li>
                                        <li><div class="cc"><i class="fa fa-arrow-right"></i> <strong>16</strong> <small>New Users (last week)</small></div></li>
                                        <li class="divider"></li>
                                        <li><div class="cc"><i class="fa fa-shopping-cart"></i> <strong>259</strong> <small>Total Shop Items</small></div></li>
                                        <li><div class="cc"><i class="fa fa-tag"></i> <strong>8650</strong> <small>Total Orders</small></div></li>
                                        <li><div class="cc"><i class="fa fa-repeat"></i> <strong>29</strong> <small>Pending Orders</small></div></li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
