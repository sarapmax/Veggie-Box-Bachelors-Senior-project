@extends('layouts.inspinia_farmer')

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
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">ตลอดทั้งปี</span>
                    <h5>รายได้ทั้งหมด</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format(App\FarmerOrder::join('orders', 'farmer_orders.order_id', '=', 'orders.id')
    								->join('order_details', 'orders.id', '=', 'order_details.order_id')
    								->join('products', 'order_details.product_id', '=', 'products.id')
    								->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    								->where('farm_products.farmer_id', '=', auth()->guard('farmer')->user()->id)
    								->sum('order_details.sub_total')/10) }} บาท</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">ตลอดทั้งปี</span>
                    <h5>ยอดการสั่งซื่อ</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ App\FarmerOrder::join('orders', 'farmer_orders.order_id', '=', 'orders.id')
    								->join('order_details', 'orders.id', '=', 'order_details.order_id')
    								->join('products', 'order_details.product_id', '=', 'products.id')
    								->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    								->where('farm_products.farmer_id', '=', auth()->guard('farmer')->user()->id)
    								->count() }}</h1>
                    {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                    <small>New orders</small> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>สินค้าทั้งหมด</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ App\FarmProduct::where('farmer_id', auth()->guard('farmer')->user()->id)->count() }}</h1>
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
                    <div class="col-lg-12">
                        <canvas id="barChart" height="100"></canvas>
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
                    <h5>ข้อความล่าสุดจากแอดมิน</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <a href="{{ url('farmer/inbox') }}">ดูทั้งหมด</a>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="feed-activity-list">
                        @foreach(App\FarmerInbox::where('farmer_id', auth()->guard('farmer')->user()->id)->orderBy('created_at', 'DESC')->limit(10)->get() as $farmer_inbox)
                        <div class="feed-element">
                            <div>
                                <small class="pull-right text-navy">{{ $farmer_inbox->created_at->diffForHumans() }}</small>
                                <strong>แอดมิน</strong>
                                <div>{!! str_limit(strip_tags($farmer_inbox->message), 100) !!} <a target="_blank" href="{{ url('farmer/inbox/detail/'.$farmer_inbox->slug) }}"><i class="fa fa-external-link"> </i></a></div>
                                <small class="text-muted">{{ $farmer_inbox->created_at->format('d/m/Y H:i:s') }}</small>
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
                                    <table class="table table-hover " id="products" >
										<thead>
											<tr>
												<th>#</th>
												<th>รหัสการสั่งซื้อ</th>
												<th>สินค้า</th>
												<th>ราคารวม</th>
												<th>วันที่สั่งซื้อ</th>
											</tr>
										</thead>
										<tbody>
											@foreach(App\FarmerOrder::join('orders', 'farmer_orders.order_id', '=', 'orders.id')
			    								->join('order_details', 'orders.id', '=', 'order_details.order_id')
			    								->join('products', 'order_details.product_id', '=', 'products.id')
			    								->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
			    								->where('farm_products.farmer_id', '=', auth()->guard('farmer')->user()->id)
			    								->select('farm_products.*', 'farmer_orders.order_number AS order_number', 'order_details.quantity AS qty', 'farmer_orders.created_at AS order_date')
			    								->orderBy('order_date', 'DESC')
			    								->limit(5)
			    								->get() as $i => $order)
											<tr>
												<td>{{ $i + 1 }}</td>
												<td>{{ $order->order_number }}</td>
												<td><a href="{{ route('farmer.product.show', $order->id) }}"><i class="fa fa-external-link"> </i></a> {{ $order->name }} {{ $order->qty }} {{ $order->unit }}</td>
												<td>{{ number_format($order->price * $order->qty) }} บาท</td>
												<td>{{ $order->order_date }}</td>
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
        </div>
    </div>
</div>

@endsection

@section('admin-js')

<script>

orderGraph('{{ Carbon\Carbon::now()->subMonths(3) }}', '{{ Carbon\Carbon::now() }}', '3 เดือนที่ผ่านมานี้')

    function orderGraph(start_date, end_date, d) {
    	var labels = [], data = [];
        
        $.get('farmer/get_order_graph/' + start_date + '/'+ end_date, function(result) {
            

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