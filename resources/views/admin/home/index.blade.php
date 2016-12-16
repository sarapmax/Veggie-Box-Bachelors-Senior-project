@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>หน้าแรก</h2><br>
        <ol class="breadcrumb">
            <li class="active">
                <strong>หน้าแรก</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">ตลอดทั้งปี</span>
                    <h5>รายได้ทั้งหมด</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format(App\OrderDetail::sum('sub_total')/10) }} บาท</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">ตลอดทั้งปี</span>
                    <h5>ยอดการสั่งซื่อ</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ App\Order::count() }}</h1>
                    {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>สินค้าทั้งหมด</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ App\Product::count() }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>สมาชิกทั้งหมด</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ App\Customer::count() }}</h1>
                </div>
            </div>
        </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>การสั่งซื้อสินค้า</h5>
                    <div class="pull-right">
                        <span id="date_text"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="btn-group">
                            <a onClick="orderGraph('{{ Carbon\Carbon::now()->startOfMonth() }}', '{{ Carbon\Carbon::now()->endOfMonth() }}', 'เดือนนี้')" class="btn btn-xs btn-white cickDate">เดือนนี้</a>
                            <a onClick="orderGraph('{{ Carbon\Carbon::now()->subMonths(3) }}', '{{ Carbon\Carbon::now() }}', '3 เดือนที่ผ่านมานี้')" class="btn btn-xs btn-white cickDate">3 เดือนที่ผ่านมา</a>
                            <a onClick="orderGraph('{{ Carbon\Carbon::now()->startOfYear() }}', '{{ Carbon\Carbon::now()->endOfYear() }}', 'ปีนี้')" class="btn btn-xs btn-white cickDate">ปีนี้</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                    <div class="col-lg-10">
                        <canvas id="barChart" height="100"></canvas>
                    </div>
                    <div class="col-lg-2">
                        <ul class="stat-list">
                            <li>
                                <h2 class="no-margins">{{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->startOfMonth(), Carbon\Carbon::now()->endOfMonth()])->count() }}</h2>
                                <small>ยอดขายทั้งหมด ในเดืนนี้</small>
                                <div class="progress progress-mini">
                                    <div style="width: {{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->startOfMonth(), Carbon\Carbon::now()->endOfMonth()])->count() }}%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins">{{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->subMonths(3), Carbon\Carbon::now()])->count() }}</h2>
                                <small>ยอดขายทั้งหมด 3 เดือนที่ผ่านมานี้</small>
                                <div class="progress progress-mini">
                                    <div style="width: {{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->subMonths(3), Carbon\Carbon::now()])->count() }}%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins">{{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->startOfYear(), Carbon\Carbon::now()->endOfYear()])->count() }}</h2>
                                <small>ยอดขายทั้งหมด ในปีนี้</small>
                                <div class="progress progress-mini">
                                    <div style="width: {{ App\Order::whereBetween('created_at', [Carbon\Carbon::now()->startOfYear(), Carbon\Carbon::now()->endOfYear()])->count() }}%;" class="progress-bar"></div>
                                </div>
                            </li>
                            </ul>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>


    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ข้อความล่าสุดจากลูกค้า</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <a href="{{ url('admin/inbox/customer') }}">ดูทั้งหมด</a>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">
                        @foreach(App\CustomerInbox::where('admin', 0)->orderBy('created_at', 'DESC')->get() as $customer_inbox)
                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy">{{ $customer_inbox->created_at->diffForHumans() }}</small>
                                <strong>{{ $customer_inbox->customer->firstname }} {{ $customer_inbox->customer->lastname }}</strong>
                                <div>{!! str_limit(strip_tags($customer_inbox->message), 100) !!} <a target="_blank" href="{{ url('admin/inbox/customer/detail/'.$customer_inbox->slug) }}"><i class="fa fa-external-link"> </i></a></div>
                                <small class="text-muted">{{ $customer_inbox->created_at->format('d/m/Y H:i:s') }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>การสั่งซื้อล่าสุด</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <a href="{{ url('admin/order') }}">ดูทั้งหมด</a>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-hover " id="products" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>รหัสการสั่งซื้อ</th>
                                                <th>ชื่อลูกค้า</th>
                                                <th>ราคารวม</th>
                                                <th>วันที่สั่งซื้อ</th>
                                                <th>สถานะ</th>
                                                <th>สินค้าจากฟาร์ม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\Order::orderBy('created_at', 'DESC')->limit(5)->get() as $i => $order)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $order->order_number }} <a href="{{ url('admin/order/detail/'.$order->id) }}"><i class="fa fa-external-link"> </i></a></td>
                                                <td style="text-align: center;">
                                                    {{ $order->firstname  }} {{ $order->lastname }}
                                                </td>
                                                <td>
                                                    <?php $total = 0; ?>
                                                    @foreach ($order->order_detail as $od)
                                                        <?php $total += $od->sub_total; ?>
                                                    @endforeach
                                                    {{ coinToBaht($total) }} บาท ({{ viaCoin($total) }})
                                                </td>
                                                <td>
                                                    {{ $order->created_at->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    {{ adminOrderStatus($order->order_status) }}
                                                </td>
                                                <td>
                                                    <ul style="padding:0px;list-style: none;">
                                                    <?php $farm_name = array(); ?>
                                                    @foreach($order->product as $product)
                                                        <?php array_push($farm_name, $product->farm_product->farmer->farm_name); ?>
                                                    @endforeach
                                                    <?php $farm_name = array_unique($farm_name); ?>
                                                    @foreach($farm_name as $name)
                                                        <li>{{ $name }}</li>
                                                    @endforeach
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>การแจ้งเตือนล่าสุด</h5>
                        </div>
                        <div class="ibox-content">
                            <table class="table no-margins">
                                <tbody>
                                @foreach(App\AdminNotification::orderBy('created_at', 'DESC')->limit(5)->get() as $noti)
                                <tr>
                                    <td><small>{{ $noti->text }}</small></td>
                                    <td style="width:100px;" class="text-navy"> <small>{{ $noti->created_at->diffForHumans() }}</small> </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>แผนที่แสดงพื้นที่จัดส่งสินค้า</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="map_canvas" style="width:400;height:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('admin-js')
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDpdWsxjo5HJOPsERUyqQnGkgCwdtlr0HI"></script>
<script type="text/javascript">
    setupMap()

    function setupMap() { 
        var myOptions = {
            zoom: 13,
             center: new google.maps.LatLng(20.050408302817274, 99.87903010100126),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        $.get('admin/get_order_map', function(result) {

            for(var i = 0; i<result.length; i++) {
                var latLng = result[i].latLng.split(',');
                var lat = latLng[0].substring(1)
                var lng = latLng[1].substring(1).slice(0, -1)
                var name = 'คุณ '+ result[i].firstname + ' ' + result[i].lastname
                var latLng = new google.maps.LatLng(lat, lng)

                var markeroption = {map:map, html:name, position:latLng}
                var marker = new google.maps.Marker(markeroption)

                var infowindow = new google.maps.InfoWindow({
                    map:map,
                    content: name,
                    position:  new google.maps.LatLng(lat, lng)
                });

                google.maps.event.addListener(marker, 'click', function(e) {
                    infowindow.setContent(this.html)
                    infowindow.open(map, this)
                })
            }
        })  
    }

    orderGraph('{{ Carbon\Carbon::now()->subMonths(3) }}', '{{ Carbon\Carbon::now() }}', '3 เดือนที่ผ่านมานี้')

    function orderGraph(start_date, end_date, d) {
        var labels = [], data = [];
        
        $.get('admin/get_order_graph/' + start_date + '/'+ end_date, function(result) {
            

            for (var i = 0; i < result.length; i++) {
                labels.push(date_format(result[i].date));
                data.push(result[i].order_count);
            }

            var barData = {
                labels: labels,
                datasets: [
                    {
                        label: 'ยอดการสั่งซื้อสินค้า '+ d,
                        backgroundColor:'rgba(26,179,148, 0.7)',
                        borderColor: 'rgba(26,179,148, 0.5)',
                        data: data
                    },
                ]
                };

                var barOptions = {
                tooltips : {
                    enabled: true      
                },
                scales: {
                        xAxes: [{
                            beginAtZero: true,
                            stacked: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'วันที่'
                            },
                            ticks: {
                                fontSize: 9,
                             }
                        }],
                        yAxes: [{
                            beginAtZero: true,
                            stacked: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'ยอดการสั่งซื่อ'
                            },
                            ticks: {
                                fontSize: 20,
                                 beginAtZero: true,
                                 userCallback: function(label, index, labels) {
                                     // when the floored value is the same as the value we have a whole number
                                     if (Math.floor(label) === label) {
                                         return label;
                                     }

                                 },
                             }
                        }]
                    }
                }


                var ctx = document.getElementById("barChart").getContext("2d");
                var myNewChart = new Chart(ctx, {type: 'bar', data: barData, options: barOptions});
        })
    }

    function date_format(input){
        var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
          "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤษจิกายน", "ธันวาคม"
        ];

        var d = new Date(Date.parse(input.replace(/-/g, "/")));
        var month = monthNames[d.getMonth()];
        // return (date);  
        return (d.getDate()+' '+month);
    };
</script>


@endsection