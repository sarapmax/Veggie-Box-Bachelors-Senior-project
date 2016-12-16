@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> การสั่งซื้อ VeggieCoin ของฉัน</h3><hr/>
	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>ราคา</th>
					<th>จำนวน VeggieCoin ที่ได้รับ</th>
					<th>วันที่ซื้อ</th>
				</tr>
			</thead>
			<tbody>
				@foreach($order_coins as $index => $order_coin)
				<tr>
					<td>{{ $index+1 }}</td>
					<td>{{ number_format($order_coin->coin_package->price) }}</td>
					<td>{{ number_format($order_coin->coin_package->coin_amount + ($order_coin->coin_package->coin_amount * ($order_coin->coin_package->increase_percent/100))) }}</td>
					<td>{{ $order_coin->created_at->format('d/m/Y H:i:s') }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		@include('pagination.default', ['paginator' => $order_coins])
	</div>
</div>


@endsection