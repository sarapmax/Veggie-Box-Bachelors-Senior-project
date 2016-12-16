@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>การสั่งซื้อเหรียญ VeggieCoin</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>การสั่งซื้อเหรียญ VeggieCoin</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>การสั่งซื้อ</h5>
				</div>
				{{-- @if(Session::has('alert-success')) --}}

				{{-- @endif --}}
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="admin-coin" >
						<thead>
							<tr>
								<th>#</th>
								<td>ลูกค้า</td>
								<th>ราคา</th>
								<th>จำนวน VeggieCoin ที่ได้รับ</th>
								<th>วันที่ซื้อ</th>
							</tr>
						</thead>
						<tbody>
							@foreach(App\OrderCoin::orderBy('created_at', 'DESC')->get() as $index => $order_coin)
							<tr>
								<td>{{ $index+1 }}</td>
								<td>{{ $order_coin->customer->firstname }} {{ $order_coin->customer->lastname }}</td>
								<td>{{ number_format($order_coin->coin_package->price) }}</td>
								<td>{{ number_format($order_coin->coin_package->coin_amount + ($order_coin->coin_package->coin_amount * ($order_coin->coin_package->increase_percent/100))) }}</td>
								<td>{{ $order_coin->created_at->format('d/m/Y H:i:s') }}</td>
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
	$('#admin-coin').DataTable({
		"oLanguage": {
        	"sLengthMenu": "แสดง _MENU_ Record ต่อหน้า",
        	"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
        	"sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ Entries",
        	"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        	"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        	"sSearch": "ค้นหา :"
        }
	});
</script>
@endsection
