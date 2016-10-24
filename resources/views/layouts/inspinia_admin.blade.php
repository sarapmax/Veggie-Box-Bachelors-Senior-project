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
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == '' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/') }}"><i class="fa fa-desktop"></i> <span class="nav-label"> หน้าแรก</span></a>
                </li>
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == 'category' || Request::segment(2) == 'sub_category' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/category') }}"><i class="fa fa-list"></i> <span class="nav-label"> ประเภทสินค้า</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li {{ Request::segment(2) == 'category' ? 'class=active' : '' }}><a href="{{ url('admin/category') }}"> ประเภทสินค้า</a></li>
                        <li {{ Request::segment(2) == 'sub_category' ? 'class=active' : '' }}><a href="{{ url('admin/sub_category') }}"> ประเภทสินค้าย่อย</a></li>
                    </ul>
                </li>
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == 'product_selection' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/product_selection') }}"><i class="fa fa-check-square-o"></i> <span class="nav-label">เลือกสินค้า</span> </a>
                </li>
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == 'product' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/product') }}"><i class="fa fa-cubes"></i><span class="nav-label"> สินค้า</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/feed') }}"><i class="fa fa-newspaper-o"></i><span class="nav-label"> ข่าวสาร</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/coinpackage') }}"><i class="fa fa-money"></i><span class="nav-label"> เหรียญ​ VeggieBox</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-truck"></i><span class="nav-label"> การสั่งซื้อสินค้า</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ url('admin/order') }}"><i class="fa fa-shopping-cart "></i> <span class="nav-label"> Admin Order</span> </a></li>
                        <li><a href="{{ url('admin/preorder') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label"> Pre-Order</span> </a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/inbox') }}"><i class="fa fa-inbox"></i><span class="nav-label"> ข้อความ</span></a>
                </li>
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == 'admin' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/admin') }}"><i class="fa fa-user"></i> <span class="nav-label"> แอดมิน</span></a>
                </li>
                <li {{ Request::segment(1) == 'admin' && Request::segment(2) == 'farmer' ? 'class=active' : '' }}>
                    <a href="{{ url('admin/farmer') }}"><i class="fa fa-user"></i> <span class="nav-label"> Farmer</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/admininformation') }}"><i class="fa fa-user"></i> <span class="nav-label"> ข้อมูลแอดมิน</span></a>
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
                        <i class="fa fa-user"></i>{{ auth()->guard('admin')->user()->fullname }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/logout') }}"><i class="fa fa-sign-out"> </i> ออกจากระบบ</a></li>
                    </ul>
                </li>
            </ul>

        </nav>
        </div>
        @yield('content')
        <div class="footer">
            <div>
                <strong>Copyright</strong> VeggieBox &copy; 2016
            </div>
        </div>
    </div>
</div>

@endsection
