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

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
    <nav class="navbar-inverse navbar-static-top" role="navigation">
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
            <li class="active">
                <a href="{{url('/')}}">
                    <i class="glyphicon glyphicon-home" aria-hidden="true"></i>
                    หน้าแรก
                </a>
            </li>
            <li>
                <a href="{{url('customer/veggiecoin')}}">
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
            <li>
                <a href="{{url('customer/cart')}}">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    ตระกร้าสินค้า
                </a>
            </li>
            <li class="dropdown">
                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"> </i> ธีรพงษ์ โพธิพันธุ์ ( 2,000 <i class="fa fa-viacoin"></i>) <span class="caret"></span></a>
                <ul style="border: 1px solid #e7eaec;" role="menu" class="dropdown-menu">
                    <li><a href=""><i class="fa fa-user"> </i> ข้อมูลส่วนตัว</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out"></i> ออกจากระบบ</a></li>
                </ul>
            </li>

            <li>
                
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
        </nav>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="container">
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


    <script>
        // $(document).ready(function() {

        //     var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
        //     var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

        //     var data1 = [
        //         { label: "Data 1", data: d1, color: '#17a084'},
        //         { label: "Data 2", data: d2, color: '#127e68' }
        //     ];
        //     $.plot($("#flot-chart1"), data1, {
        //         xaxis: {
        //             tickDecimals: 0
        //         },
        //         series: {
        //             lines: {
        //                 show: true,
        //                 fill: true,
        //                 fillColor: {
        //                     colors: [{
        //                         opacity: 1
        //                     }, {
        //                         opacity: 1
        //                     }]
        //                 },
        //             },
        //             points: {
        //                 width: 0.1,
        //                 show: false
        //             },
        //         },
        //         grid: {
        //             show: false,
        //             borderWidth: 0
        //         },
        //         legend: {
        //             show: false,
        //         }
        //     });

        //     var lineData = {
        //         labels: ["January", "February", "March", "April", "May", "June", "July"],
        //         datasets: [
        //             {
        //                 label: "Example dataset",
        //                 fillColor: "rgba(220,220,220,0.5)",
        //                 strokeColor: "rgba(220,220,220,1)",
        //                 pointColor: "rgba(220,220,220,1)",
        //                 pointStrokeColor: "#fff",
        //                 pointHighlightFill: "#fff",
        //                 pointHighlightStroke: "rgba(220,220,220,1)",
        //                 data: [65, 59, 40, 51, 36, 25, 40]
        //             },
        //             {
        //                 label: "Example dataset",
        //                 fillColor: "rgba(26,179,148,0.5)",
        //                 strokeColor: "rgba(26,179,148,0.7)",
        //                 pointColor: "rgba(26,179,148,1)",
        //                 pointStrokeColor: "#fff",
        //                 pointHighlightFill: "#fff",
        //                 pointHighlightStroke: "rgba(26,179,148,1)",
        //                 data: [48, 48, 60, 39, 56, 37, 30]
        //             }
        //         ]
        //     };

        //     var lineOptions = {
        //         scaleShowGridLines: true,
        //         scaleGridLineColor: "rgba(0,0,0,.05)",
        //         scaleGridLineWidth: 1,
        //         bezierCurve: true,
        //         bezierCurveTension: 0.4,
        //         pointDot: true,
        //         pointDotRadius: 4,
        //         pointDotStrokeWidth: 1,
        //         pointHitDetectionRadius: 20,
        //         datasetStroke: true,
        //         datasetStrokeWidth: 2,
        //         datasetFill: true,
        //         responsive: true,
        //     };


        //     var ctx = document.getElementById("lineChart").getContext("2d");
        //     var myNewChart = new Chart(ctx).Line(lineData, lineOptions);

        // });
    </script>

</body>

</html>