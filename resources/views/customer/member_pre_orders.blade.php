@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> การสั่งซื้อสินค้า Pre-Order ของฉัน</h3><hr/>
	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th style="width:100px;">รหัสการสั่งซื้อ</th>
					<th>ชื่อสินค้า</th>
					<th>ราคารวม</th>
					<th>วันที่สั่งซื้อ</th>
					<th class="text-center">สถานะ</th>
					<th>การจัดส่ง</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{ $order->order_number }} <a href="{{ url('member/pre-order/'.$order->order_number) }}"><i class="fa fa-external-link"> </i></a></td>
					<td>
						@foreach ($order->pre_order_detail as $product)
						{{ $product->product->farm_product->name }} x {{ $product->quantity }} {{ $product->product->farm_product->unit }}
						@endforeach
					</td>
					<td>
						<?php $total = 0; ?>
						@foreach ($order->pre_order_detail as $od)
							<?php $total += $od->sub_total; ?>

						@endforeach
						{{ viaCoin($total) }}
					</td>
					<td>{{ $order->created_at->format('d/m/Y') }}</td>
					<td>
						<center>
						@foreach ($order->pre_order_detail as $havest)
						{{ productStatus($havest->product->farm_product->status) }} <br/><br/>
						<?php
		                    $havest_date = date('Y-m-d', strtotime($havest->product->farm_product->plant_date. ' + '.$havest->product->farm_product->grow_estimate.' days'));

		                   $secs = strtotime($havest_date) - strtotime(date('Y-m-d'));

		                   $havest['havest_countdown'] = $secs / 86400;
		                 ?>
		                 @endforeach
						
		                 <small style="color:#f0ad4e;">(เหลืออีกประมาณ {{ $havest['havest_countdown'] }} วัน จะได้รับสินค้า)</small>
		                 </center>
					</td>
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