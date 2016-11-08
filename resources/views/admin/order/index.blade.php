@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>การสั่งซื้อสินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>การสั่งซื้อสินค้า</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>การสั่งซื้อสินค้า</h5>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="products" >
						<thead>
							<tr>
								<th>#</th>
								<th>รหัสการสั่งซื้อ</th>
								<th>ชื่อลูกค้า</th>
								<th>ราคารวม</th>
								<th>วันที่สั่งซื้อ</th>
								<th>สถานะ</th>
								<th>สินค้าจากฟาร์ม</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($orders as $order)
							<tr>
								<td>{{ $i++ }}</td>
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
								<td>
									@if(!$order->send_to_farmer)
										<a href="{{ url('admin/order/sendToFarm/'.$order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-sign-in"> </i> ส่งรายการสั่งซื้อให้ฟาร์ม</a>
									@else
										<a disabled href="#" class="btn btn-default btn-sm"><i class="fa fa-check-square"> </i> ส่งรายการสั่งซื้อให้ฟาร์มแล้ว</a>
									@endif
								</td>
								<td>
									@if($order->order_status == 'paid')
										<a href="{{ url('admin/order/activeShipped/'.$order->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-truck"> </i>   ยืนยันการจัดส่ง</a>
									@endif

									@if($order->order_status == 'shipped')
										<a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-truck"> </i>   จัดส่งสินค้าแล้ว</a>
									@endif
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


@endsection

@section('admin-js')
<script>
	$('#products').DataTable({
		"oLanguage": {
        	"sLengthMenu": "แสดง _MENU_ Record ต่อหน้า",
        	"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
        	"sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ Entries",
        	"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        	"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        	"sSearch": "ค้นหา :"
        },
         "iDisplayLength": 50
	});
</script>

@endsection
