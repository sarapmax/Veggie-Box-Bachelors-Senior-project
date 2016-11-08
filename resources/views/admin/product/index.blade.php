@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>สินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
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
					<h5>จัดการสินค้าสินค้า</h5>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="products" >
						<thead>
							<tr>
								<th>#</th>
								<th>จากฟาร์ม</th>
								<th>รูปภาพ</th>
								<th>ประเภทสินค้า</th>
								<th>ชื่อสินค้า</th>
								<th>สถานะ</th>
								<th>จำนวน</th>
								<th>ราคา</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($products as $product)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $product->farm_product->farmer->farm_name }}  <a target="_blank" href="{{ url('admin/farmer/show?farmer_id='.$product->farm_product->farmer->id) }}"><i class="fa fa-external-link"> </i></a></td>
								<td style="text-align: center;">
									<img style="width:70px;" src="{{ asset('thumb_image/'.$product->farm_product->thumb_image) }}">
								</td>
								<td>
										<p><strong>{{ $product->farm_product->sub_category->category->name }}</strong></p>

										<p>{{ $product->farm_product->sub_category->name }}</p>
								</td>
								<td>
									{{ $product->farm_product->name }} <a href="{{ route('admin.product.show', $product->id) }}"><i class="fa fa-external-link"> </i></a>
								</td>
								<td>
									{{ productStatus($product->farm_product->status) }}
								</td>
								<td> {{ productCheckQuantity($product->quantity, $product->farm_product->unit) }} </td>
								<td> 
									{{ discountPrice($product->price, $product->discount_price, $product->farm_product->unit) }} 
								</td>
								<td style="text-align:center;">
									<a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"> </i></a> 
									<span style="color:#D9D0D9"> | </span> 
									<form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('คูณแน่ใจที่จะส่งสินค้านี้กลับไปให้ Farmer ?')">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"> </i></button>
									</form>
								</td>
								</form>
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
