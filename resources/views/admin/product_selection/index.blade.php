@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>เลือกสินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>เลือกสินค้า</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>เลือกสินค้า</h5>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="product_selection" >
						<thead>
							<tr>
								<th>#</th>
								<th>จากฟาร์ม</th>
								<th>ประเภทสินค้า</th>
								<th>รูปภาพ</th>
								<th>ชื่อสินค้า</th>
								<th>สถานะ</th>
								<th>จำนวน</th>
								<th>ราคาเดิม</th>
								<th style="width:230px;">กำหนดจำนวนที่เลือกและราคา</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($selection_products as $selection_product)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $selection_product->farm_product->farmer->farm_name }}  <a target="_blank" href="{{ url('admin/farmer/show?farmer_id='.$selection_product->farm_product->farmer->id) }}"><i class="fa fa-external-link"> </i></a></td>
								<td>
									<strong>{{ $selection_product->farm_product->sub_category->category->name }}</strong>
									<p>{{ $selection_product->farm_product->sub_category->name }}</p>
								</td>
								<td style="text-align: center;">
									<img style="width:70px;" src="{{ asset('thumb_image/'.$selection_product->farm_product->thumb_image) }}">
								</td>
								<td>
									{{ $selection_product->farm_product->name }} <a target="_blank" href="{{ route('admin.product.show', $selection_product->id) }}"><i class="fa fa-external-link"> </i></a>
								</td>
								<td>
									{{ productStatus($selection_product->farm_product->status) }}
								</td>
								<td> {{ productCheckQuantity($selection_product->quantity, $selection_product->farm_product->unit) }} </td>
								<td> {{ discountPrice($selection_product->farm_product->price, $selection_product->farm_product->discount_price, $selection_product->farm_product->unit) }} </td>

								<form action="{{ url('admin/product_select') }}" method="POST" role="form">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="product_id" value="{{ $selection_product->id }}">
								<td>
									<span>จำนวน : &nbsp;&nbsp;</span><input style="width:180px;margin-bottom: 5px;" type="number" name="quantity" class="form-control" placeholder="จำนวน ({{ $selection_product->farm_product->unit }})" value="{{ $selection_product->quantity }}"><br/>
									@if($errors->has('quantity'))
										<span style="color:#a94442;">{{ $errors->first('quantity') }}</span>
									@endif
									ราคา : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:180px;margin-bottom: 5px;" type="number" name="price" class="form-control" placeholder="ราคาใหม่ / {{ $selection_product->farm_product->unit }}" value="{{ $selection_product->price }}"><br/>
									@if($errors->has('price'))
										<span style="color:#a94442;">{{ $errors->first('price') }}</span>
									@endif
									ลดราคา : <input style="width:180px;" type="number" name="discount_price" class="form-control" placeholder="ราคาลด / {{ $selection_product->farm_product->unit }}" value="{{ $selection_product->discount_price }}">
								</td>
								<td style="text-align: center;">
									<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"> </i> เลือก</button>
								</td>
								</form>
								<td style="text-align: center;">
									<form action="{{ route('admin.product.destroy', $selection_product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('คูณแน่ใจที่จะส่งสินค้านี้กลับไปให้ Farmer ?')">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-default"><i class="fa fa-close"> </i> ปฏิเสธ</button>
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
	$('#product_selection').DataTable({
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
