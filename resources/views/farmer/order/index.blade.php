@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>การสั่งซื้อสินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer') }}">หน้าแรก</a>
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
								<th>สินค้า</th>
								<th>ราคารวม</th>
								<th>วันที่สั่งซื้อ</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($farmer_orders as $order)
							<tr>
								<td>{{ $i++ }}</td>
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
