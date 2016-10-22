@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>สินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>สินค้า</strong>
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
					<div class="ibox-tools">
						<a href="{{ url('farmer/product/create') }}" class="btn btn-primary"><i class="fa fa-plus"> </i> เพิ่มสินค้า</a>
					</div>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="product" >
						<thead>
							<tr>
								<th>#</th>
								<th>รูปภาพ</th>
								<th>ประเภทสินค้า</th>
								<th>ชื่อสินค้า</th>
								<th>สถานะ</th>
								<th>ราคา</th>
								<th>จำนวนที่มีอยู่</th>
								<th style="width:185px;">ส่งสินค้าให้แอดมิน</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($farm_products as $farm_product)
							<tr>
								<td>{{ $i++ }}</td>
								<td><img style="width:80px;" src="{{ asset('thumb_image_thumb/'.$farm_product->thumb_image) }}"></td>
								<td>
									<strong>{{ $farm_product->sub_category->category->name }}</strong>
									<p>{{ $farm_product->sub_category->name }}</p>
								</td>
								<td>{{ $farm_product->name }} <a href="{{ route('farmer.product.show', $farm_product->id) }}"><i class="fa fa-external-link"> </i></a></td>
								<td>
									{{ productStatus($farm_product->status) }}
								</td>
								<td>
									{{ discountPrice($farm_product->price, $farm_product->discount_price, $farm_product->unit) }}
								</td>
								<td>{{ productCheckQuantity($farm_product->quantity, $farm_product->unit) }}</td>
								<td style="text-align:center;">
									<div class="input-group">
										<form action="{{ url('farmer/product/sendToAdmin') }}" method="POST" style="display:inline" onsubmit="return confirm('คุณแน่ใจที่จะส่งสินค้านี้ให้แอดมิน')">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<input type="hidden" name="farm_product_id" value="{{ $farm_product->id }}">
											<input style="height: 22px;width:150px;" placeholder="จำนวน ({{ $farm_product->unit }})" type="number" name="quantity" class="form-control">
											<span class="input-group-btn">
												<button type="submit" class="btn btn-primary btn-xs"><i class="fa fa-arrow-circle-right"></i> ส่ง</button>
											</span>
										</form><br/>
										@if($errors->has('quantity'))
		                                    <span style="color:#a94442;">{{ $errors->first('quantity') }}</span>
		                                @endif
									</div>
								</td>
								<td align="center">
									<a href="{{ route('farmer.product.edit', $farm_product->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"> </i></a>
									<form action="{{ route('farmer.product.destroy', $farm_product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('คูณแน่ใจที่จะลบสินค้านี้ ?')">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"> </i></button>
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
