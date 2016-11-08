@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> การสั่งซื้อสินค้าของฉัน</h3><hr/>
	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>รหัสการสั่งซื้อ</th>
					<th>ราคารวม</th>
					<th>วันที่สั่งซื้อ</th>
					<th>สถานะ</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{ $order->order_number }} <a href="{{ url('member/order/'.$order->order_number) }}"><i class="fa fa-external-link"> </i></a></td>
					<td>
						<?php $total = 0; ?>
						@foreach ($order->order_detail as $od)
							<?php $total += $od->sub_total; ?>
						@endforeach
						{{ viaCoin($total) }}
					</td>
					<td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
					<td>
						{{ adminOrderStatus($order->order_status) }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@include('pagination.default', ['paginator' => $orders])
	</div>
</div>


@endsection