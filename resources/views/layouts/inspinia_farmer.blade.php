@extends('layouts.inspinia_master')

@section('app')
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <a href=""><img style="width:150px;" src="{{ asset('img/veggibox_logo.png') }}"></a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="#">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        <a href=""><img style="height:50px;" src="{{ asset('img/veggiebox_logo_collapse.png') }}"></a>
                    </div>
                </li>
                <li {{ Request::segment(1) == 'farmer' && Request::segment(2) == '' ? 'class=active' : '' }}>
                    <a href="{{ url('farmer/') }}"><i class="fa fa-desktop"></i> <span class="nav-label"> หน้าแรก</span></a>
                </li>
                <li {{ Request::segment(1) == 'farmer' && Request::segment(2) == 'category' || Request::segment(2) == 'sub_category' ? 'class=active' : '' }}>
                    <a href="{{ url('farmer/category') }}"><i class="fa fa-list"></i> <span class="nav-label"> ประเภทสินค้า</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li {{ Request::segment(2) == 'category' ? 'class=active' : '' }}><a href="{{ url('farmer/category') }}"> ประเภทสินค้า</a></li>
                        <li {{ Request::segment(2) == 'sub_category' ? 'class=active' : '' }}><a href="{{ url('farmer/sub_category') }}"> ประเภทสินค้าย่อย</a></li>
                    </ul>
                </li>
                <li {{ Request::segment(1) == 'farmer' && Request::segment(2) == 'product' || Request::segment(2) == 'admin_product' ? 'class=active' : '' }}>
                    <a href="{{ url('farmer/product') }}"><i class="fa fa-cubes"></i> <span class="nav-label"> สินค้า</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li {{ Request::segment(2) == 'product' ? 'class=active' : '' }}><a href="{{ url('farmer/product') }}"> สินค้า</a></li>
                        <li {{ Request::segment(2) == 'admin_product' ? 'class=active' : '' }}><a href="{{ url('farmer/admin_product') }}"> สินค้าที่ส่งให้แอดมิน</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('farmer/inbox') }}"><i class="fa fa-inbox"></i> <span class="nav-label">Inbox</span> </a>
                </li>
                <li>
                    <a href="{{ url('farmer/preorder') }}"><i class="fa fa-reorder"></i> <span class="nav-label">Pre-Order</span> </a>
                </li>
                <li>
                    <a href="{{ url('farmer/order') }}"><i class="fa fa-list"></i> <span class="nav-label">Order</span> </a>
                </li>
                <li>
                    <a href="{{ url('farmer/certification') }}"><i class="fa fa-list"></i> <span class="nav-label">Certification</span> </a>
                </li>
                <li>
                    <a href="{{ url('farmer/configuration') }}"><i class="fa fa-gear"></i> <span class="nav-label">Configuration</span> </a>
                </li>
                <li {{ Request::segment(1) == 'farmer' && Request::segment(2) == 'notification' ? 'class=active' : '' }}>
                    <a href="{{ url('farmer/notification') }}"><i class="fa fa-bell"></i><span class="nav-label"> การแจ้งเตือน</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-warning">{{ App\FarmerNotification::whereRaw('Date(created_at) = CURDATE()')->where('farmer_id', auth()->guard('farmer')->user()->id)->count() }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach(App\FarmerNotification::orderBy('created_at', 'DESC')->whereRaw('Date(created_at) = CURDATE()')->where('farmer_id', auth()->guard('farmer')->user()->id)->limit(8)->get() as $farmer_notification)
                        <li>
                            <div class="dropdown-messages-box">
                                <p style="padding: 3px 20px;min-height: 0;" class="pull-left">{!! $farmer_notification->icon !!}</p>
                                <div class="media-body">
                                    {{ $farmer_notification->text }} <br>
                                    <small class="text-muted">{{ timeAgo($farmer_notification->created_at) }}</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                        <li>
                            <div class="text-center link-block">
                                <a href="{{ url('farmer/notification') }}">
                                    <i class="fa fa-bell"></i> <strong>ดูการแจ้งเตือนทั้งหมด</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        {{ auth()->guard('farmer')->user()->farm_name }} ( {{ auth()->guard('farmer')->user()->firstname }} {{ auth()->guard('farmer')->user()->lastname }} ) <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.html"><i class="fa fa-user"> </i> ดูข้อมูลส่วนตัว</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('farmer/logout') }}"><i class="fa fa-sign-out"> </i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
        </div>
        @yield('content')
        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
        <div id="blueimp-gallery" class="blueimp-gallery">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> VeggieBox &copy; 2016
            </div>
        </div>
    </div>
</div>

@endsection
