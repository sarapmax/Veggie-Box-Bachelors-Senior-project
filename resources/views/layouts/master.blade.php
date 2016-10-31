<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>VeggieBox</title>

    <link rel="stylesheet" href="{{asset('inspinia/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('inspinia/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('inspinia/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('custom.css')}}">
    <link rel="stylesheet" href="{{asset('vegicon/style.css')}}">
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.css')}}">

    <link href="{{ asset('bower_components/slick-carousel/slick/slick.css') }} " rel="stylesheet">
    <link href="{{ asset('bower_components/slick-carousel/slick/slick-theme.css') }} " rel="stylesheet">


</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
        <div style="background-color:#f3f3f4;" class="row">
                <div style="padding:7px;" class="container">
                    <div class="col-md-12">
                        <div class="pull-left">
                            ยินดีต้อนรับสู่ <strong>Veggiebox</strong>, 
                            @if(Auth::guard('customer')->check())
                                <a href="{{ url('member/my_account') }}">{{ Auth::guard('customer')->user()->firstname }} {{ Auth::guard('customer')->user()->lastname }}</a>
                            @else
                            <a href="{{ url('login') }}">เข้าสู่ระบบ</a> หรือ <a href="{{ url('register') }}">สมัครสมาชิก</a>
                            @endif
                        </div>
                        <div class="pull-right">
                            <ul class="member-nav">
                                <li><a href="{{ url('cart') }}">ตระกร้าสินค้า</a></li>
                                <li><a href="{{ url('checkout') }}">เช็คเอาท์</a></li>
                                @if(Auth::guard('customer')->check())
                                <li><a href="{{ url('member/orders') }}">รายการสั่งซื้อ</a></li>
                                <li><a href="{{ url('member/order_coin') }}">การสั่งซื้อ VeggieCoin</a></li>

                                <li class="logout"><a href="{{ url('logout') }}"><i class="fa fa-sign-out"> </i> ออกจากระบบ</a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </div>
            </div>
    <nav style="padding: 15px;" class="navbar-inverse navbar-static-top" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button style="background-color:#1E2831;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span style="background-color: #ffffff;" class="icon-bar"></span>
        <span style="background-color: #ffffff;" class="icon-bar"></span>
        <span style="background-color: #ffffff;" class="icon-bar"></span>
      </button>
      <a href="{{ url('customer/home') }}"><img style="height:35px;margin-top:5px;" src="{{ asset('img/logo.png') }}"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul style="margin-left: 20px;" class="nav navbar-nav">
            <li {{ Request::segment(1) == '' ? 'class=active' : '' }}>
                <a href="{{url('/')}}">
                    <i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                    หน้าแรก
                </a>
            </li>
            <li {{ Request::segment(1) == 'products' || Request::segment(1) == 'product' ? 'class=active' : '' }}>
                <a href="{{url('products')}}">
                    สินค้า
                </a>
            </li>
            <li>
                <a href="{{url('customer/news')}}">
                    ข่าวสาร
                </a>
            </li>
            <li>
                <a href="{{url('customer/inbox')}}">
                    ข้อความ
                </a>
            </li>
            <li>
                <a href="{{url('customer/veggiecoin')}}">
                    ซื้อ VeggieCoin
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown">  <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    {{ Cart::count() }} &nbsp;สินค้าในตระกร้า <span class="caret"></span></a>
                <ul style="border: 1px solid #e7eaec;" role="menu" class="dropdown-menu">
                    <li>
                        <h4>สินค้าในตระกร้าทั้งหมด</h4>
                    </li>
                    @foreach(Cart::content() as $cart)
                        <li>
                            <div class="row">
                            <div class="col-lg-2">
                                <img style="width:30px;border:1px solid #ECF2EB;" src="{{ asset('thumb_image/'.$cart->options->image) }}">
                            </div>
                            <div class="col-lg-5">
                                {{ $cart->name }}
                            </div>
                            <div class="col-lg-5">
                                {{  viaCoin($cart->price) }} x {{ $cart->qty }} {{ $cart->options->size }}
                            </div>
                            </div>
                        </li>
                    @endforeach
                        <li>
                            <div class="row">
                                <div class="col-lg-7">
                                    <h4>ราคารวม : {{ Cart::total() }} <i class="fa fa-viacoin"> </i></h4>
                                </div>
                                <div class="col-lg-5">
                                    <button class="btn btn-primary btn-outline btn-sm pull-right"><i class="fa fa fa-shopping-cart"></i> เช็คเอาท์</button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <center>
                                <a class="text-center" href="{{ url('cart') }}"><h4><i class="fa fa-shopping-basket"> </i> ตระกร้าสินค้า</h4></a>
                                </center>
                            </div>
                        </li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
        </nav>
        </div>
        <div class="wrapper wrapper-content">
                
            <div class="row">

                <div class="container">
                    <div class="col-lg-12">
                        @include('customer.layouts.alert')
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>

        </div>
        <footer>
            <div style="color:#fff;" class="row">
                <div style="padding:20px;" class="container">
                    <div class="col-md-4">
                        <h4>เกี่ยวกับเรา</h4><hr/>
                        <p>
                            Quisque odio sem, molestie interdum sollicitudin ut, mollis a metus. Donec dignissim, odio nec elementum mattis, elit ligula sollicitudin massa, et venenatis neque nibh at urna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque egestas, velit non adipiscing pretium, tortor nulla fringilla nisl, ut aliquet felis nisl eu orci.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <h4>ลิ้งค์ที่เกี่ยวข้อง</h4><hr/>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-link">
                                <li>
                                    <a href="{{url('/')}}">
                                        <i class="fa fa-caret-right"></i>
                                         หน้าแรก
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customer/veggiecoin')}}">
                                        <i class="fa fa-caret-right"></i>
                                         สินค้า
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customer/news')}}">
                                        <i class="fa fa-caret-right"></i>
                                         ข่าวสาร
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customer/inbox')}}">
                                        <i class="fa fa-caret-right"></i>
                                         ข้อความ
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="footer-link">
                                <li>
                                    <a href="{{url('customer/veggiecoin')}}">
                                        <i class="fa fa-caret-right"></i>
                                         ซื้อ VeggieCoin
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customer/veggiecoin')}}">
                                        <i class="fa fa-caret-right"></i>
                                         เกี่ยวกับเรา
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('customer/veggiecoin')}}">
                                        <i class="fa fa-caret-right"></i>
                                         ติดต่อเรา
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h4>ติดต่อเรา</h4><hr/>
                        <i class="fa fa-phone-square"> </i> &nbsp;ติดต่อ : 02 4506 304 <br/><br/>
                        <i class="fa fa-envelope"> </i> &nbsp;support@veggiebox.com <br/><br/>
                        <i class="fa fa-map-marker"> </i> &nbsp; One Mac Company ม.แม่ฟ้าหลวง ประเทศไทย
                    </div> 
                </div>
            </div>
            <div style="background-color:#f3f3f4;" class="row">
                <div style="padding:5px;" class="container">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <strong>Copyright</strong> VeggieBox &copy; 2016
                        </div>
                        <div class="pull-right">
                            <strong>SENIOR PROJECT TEAM</strong>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                </div>
            </div>
        </footer>

    </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia/js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('inspinia/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>


    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>

    <!-- Flot -->
    <script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/flot/jquery.flot.resize.js') }}"></script>
   

     <script src="{{ asset('inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
    <!-- ChartJS-->
     <script src="{{ asset('inspinia/js/plugins/chartJs/Chart.min.js') }}"></script>

    <!-- Peity -->
     <script src="{{ asset('inspinia/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <!-- Peity demo -->
     <script src="{{ asset('inspinia/js/demo/peity-demo.js') }}"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>

     <!-- slick carousel-->
    <script src="{{  asset('bower_components/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('script.js') }}"></script>

    @yield('customer-js')

    <script>
        $('.box').matchHeight();

        $('.product-images').slick({
            dots: true,
            autoplay:true,
            autoplaySpeed: 2000,
        });
    </script>

</body>

</html>