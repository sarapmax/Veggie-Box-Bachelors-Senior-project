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
                <li {{ Request::segment(1) == 'farmer' && Request::segment(2) == 'product' ? 'class=active' : '' }}>
                    <a href="{{ url('farmer/product') }}"><i class="fa fa-cubes"></i> <span class="nav-label">สินค้า</span></a>
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
                    <a href="{{ url('farmer/configuration') }}"><i class="fa fa-gear"></i> <span class="nav-label">Configuration</span> </a>
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
                        <i class="fa fa-user"></i>Teerpong Phothiphun <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.html"><i class="fa fa-user"> </i> View Profile</a></li>
                        <li><a href="profile.html"><i class="fa fa-edit"> </i> Edit Profile</a></li>
                        <li class="divider"></li>
                        <li><a href=""><i class="fa fa-sign-out"> </i> Logout</a></li>
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