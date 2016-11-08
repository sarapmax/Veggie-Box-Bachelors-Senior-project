@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>รายละเอียดการสั่งซื้อ</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ url('admin/order') }}">การสั่งซื้อสินค้า</a>
			</li>
			<li class="active">
				<strong>รายละเอียดการสั่งซื้อสินค้า</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>รหัสการสั่งซื้อ {{ $order->order_number }}</h5>
				</div>
				<div class="ibox-content">
					<table class="table table-bordered">
			            <tr>
			               <td>
			               		<strong>รหัสการสั่งซื้อ</strong> : {{ $order->order_number }}
			               </td>
			               <td><strong>ลูกค้า</strong> : {{ $order->firstname }} {{ $order->lastname }}</td>
			               <td>
			                  <?php $total = 0; ?>
			                  @foreach($order->order_detail as $total_price)
			                     <?php $total+=$total_price->sub_total; ?>
			                  @endforeach
			                  <strong>ราคารวม</strong> : {{ coinToBaht($total) }} บาท ({{ viaCoin($total) }})
			               </td>
			               <td><strong>วันที่สั่งซื้อ</strong> :  {{ $order->created_at->format('d/m/Y H:i:s') }}</td>
			               <td>
			                  @if($order->order_status == 'paid')
			                        <span class="label label-success"><i class="fa fa-check"></i> จ่ายเงินแล้ว</span>
			                  @endif

			                  @if($order->order_status == 'shipped')
			                        <span class="label label-primary"><i class="fa fa-truck"></i> จัดส่งสินค้าแล้ว</span>
			                  @endif
			               </td>
			            </tr>
			         </table>
			         <br/>
			         <div class="row">
			            <div class="col-md-6" style="border-right: 1px solid #E4E9E5;">
			               <h5><i class="fa fa-cubes"> </i> รายการสินค้า</h5><br/>
			               @foreach($order->product as $product)
			                  	<li>
			                  		<a target="_blank" href="{{ route('admin.product.show', $product->id) }}">{{ $product->farm_product->name }}</a>
			                  			<span> {{ $product->pivot->quantity }} {{ $product->farm_product->unit }} ราคา {{ coinToBaht($total) }} บาท ({{ viaCoin($total) }})
			                  			</span>
			                  	</li>
			               @endforeach
			            </div>
			            <div class="col-md-6">
			               <h5><i class="fa fa-truck"> </i> ข้อมูลการจัดส่ง</h5><br/>
			               {{ $order->firstname }} {{ $order->lastname }} {{ $order->phone }} <br/>
			               {{ $order->address }} ตำบล {{ $order->sub_district }} อำเภอ {{ $order->district }} {{ $order->province }} {{ $order->zipcode }}
			            </div>
			         </div>
			         <hr/>
			         <div class="row">
			         	<div class="col-md-12">
				         	<div class="pull-right">
				         		<td>
									@if(!$order->send_to_farmer)
										<a href="{{ url('admin/order/sendToFarm/'.$order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-sign-in"> </i> ส่งรายการสั่งซื้อให้ฟาร์ม</a>
									@else
										<a disabled href="#" class="btn btn-primary btn-sm"><i class="fa fa-check-square"> </i> ส่งรายการสั่งซื้อให้ฟาร์มแล้ว</a>
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
				         	</div>
				         	<div class="clearfix"></div>
			         	</div>
			         </div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('admin-js')


@endsection
