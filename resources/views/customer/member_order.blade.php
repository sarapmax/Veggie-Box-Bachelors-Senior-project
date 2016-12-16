@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> รหัสการสั่งซื้อสินค้า : {{ $order->order_number }}</h3><hr/>
		<table class="tt table table-bordered">
            <tr>
               <td>
               		<strong>รหัสการสั่งซื้อ</strong> <br/> {{ $order->order_number }}
               </td>
               <td><strong>ลูกค้า</strong> <br/> {{ $order->firstname }} {{ $order->lastname }}</td>
               <td>
                  <?php $total = 0; ?>
                  @foreach($order->order_detail as $total_price)
                     <?php $total+=$total_price->sub_total; ?>
                  @endforeach
                  <strong>ราคารวม</strong> <br/> {{ viaCoin($total) }}
               </td>
               <td><strong>วันที่สั่งซื้อ</strong> <br/>  {{ $order->created_at->format('d/m/Y H:i:s') }}</td>
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
                     <?php
                        $havest_date = date('Y-m-d', strtotime($product->farm_product->plant_date. ' + '.$product->farm_product->grow_estimate.' days'));

                       $secs = strtotime($havest_date) - strtotime(date('Y-m-d'));

                       $havest['havest_countdown'] = $secs / 86400;
                     ?>
                     @if($product->farm_product->status == 'release')
                  	<li style="margin-bottom: 5px;">
                  		{{ $product->farm_product->name }}
                  			<span> {{ $product->pivot->quantity }} {{ $product->farm_product->unit }} {{ viaCoin($total) }}
                  			</span>
                           <small class="text-muted">สถานะ : {{ productStatus($product->farm_product->status) }}</small>
                  	</li>
                     @endif
               @endforeach
            </div>
            <div class="col-md-6">
               <h5><i class="fa fa-truck"> </i> ข้อมูลการจัดส่ง</h5><br/>
               {{ $order->firstname }} {{ $order->lastname }} {{ $order->phone }} <br/>
               {{ $order->address }} ตำบล {{ $order->sub_district }} อำเภอ {{ $order->district }} {{ $order->province }} {{ $order->zipcode }}
            </div>
         </div>
	</div>
</div>


@endsection