@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>สินค้าที่ส่งให้แอดมิน</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>สินค้าที่ส่งให้แอดมิน</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>จัดการสินค้า</h5>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="product" >
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อสินค้า</th>
								<th>ราคาเดิม</th>
								<th>ราคาใหม่</th>
								<th>จำนวนที่ส่งไป</th>
								<th>จำนวนที่เหลืออยู่</th>
								<th>สถานะการขาย</th>
								<th style="width:185px;">นำสินค้ากลับ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($admin_products as $admin_product)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $admin_product->farm_product->name }} &nbsp;<a target="_blank" href="{{ route('farmer.product.show', $admin_product->farm_product->id) }}"><i class="fa fa-external-link"> </i> </a></td>
								<td>
									{{ discountPrice($admin_product->farm_product->price, $admin_product->farm_product->discount_price, $admin_product->farm_product->unit) }}
								</td>
								<td>
									@if($admin_product->price != 0) 
										{{ discountPrice($admin_product->price, $admin_product->discount_price, $admin_product->farm_product->unit) }}
									@else 
										ยังไม่ได้กำหนดราคา
									@endif
								</td>
								<td>
									{{ productCheckQuantity($admin_product->quantity, $admin_product->farm_product->unit) }}
								</td>
								<td>
									{{ productCheckQuantity($admin_product->farm_product->quantity, $admin_product->farm_product->unit) }}
								</td>
								<td>
									{{ sellStatus($admin_product->activated) }}
								</td>
								<td style="text-align:center;">
									<div class="input-group">
										<form action="{{ url('farmer/admin_product/returnProductToFarmer') }}" method="POST" style="display:inline" onsubmit="return confirm('คุณแน่ใจที่จะนำสินค้ากลับ')">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="farm_product_id" value="{{ $admin_product->farm_product->id }}">
											<input style="height:22px;width:150px;" placeholder="จำนวน ({{ $admin_product->farm_product->unit }})" type="number" name="quantity" class="form-control">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-arrow-circle-left"></i> ยืนยัน</button>
											</span>
										</form><br/>
										@if($errors->has('quantity'))
		                                    <span style="color:#a94442;">{{ $errors->first('quantity') }}</span>
		                                @endif
									</div>
								</td>
									<td align="center">
									<form action="{{ url('farmer/admin_product/cancelAdminProduct') }}" method="POST" style="display:inline" onsubmit="return confirm('คูณแน่ใจที่จะยกเลิกการส่งสินค้า ?')">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="product_id" value="{{ $admin_product->id }}">
										<button type="submit" class="btn btn-default btn-xs"><i class="fa fa-close"> </i> ยกเลิก</button>
									</form>
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
	$('#product').DataTable({
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
