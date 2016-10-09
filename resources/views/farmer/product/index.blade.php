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
				{{-- @if(Session::has('alert-success')) --}}
				
				{{-- @endif --}}
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="product" >
						<thead>
							<tr>
								<th>#</th>
								<th>รูปภาพ</th>
								<th>ประเภทสินค้า</th>
								<th>ประเภทสินค้าย่อย</th>
								<th>ชื่อสินค้า</th>
								<th>สถานะ</th>
								<th>ราคา</th>
								<th>วันที่เพิ่ม</th>
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
									@foreach($farm_product->sub_category->slice(0, 1) as $sub_category)
										{{ $sub_category->category->name }}
									@endforeach
								</td>
								<td>
									<ul class="dashed">
										@foreach($farm_product->sub_category as $sub_category)
										<li>{{ $sub_category->name }}</li>
										@endforeach
									</ul>
								</td>
								<td>{{ $farm_product->name }}</td>
								<td>
									@if($farm_product->status == 'release')
										<label class="label label-success"><i class="fa fa-check"> </i> พร้อมขาย</label>
									@endif
									@if($farm_product->status == 'growing')
										<label class="label label-warning"><i class="fa fa-spinner fa-spin"> </i> กำลังเติบโต</label>
									@endif
								</td>
								<td>{{ $farm_product->price }}</td>
								<td>{{ date('d F Y', strtotime($farm_product->created_at)) }}</td>
								<td align="center">
									<a class="btn btn-xs btn-success" href="{{ route('farmer.product.show', $farm_product->id) }}"><i class="fa fa-eye"> </i></a>
									<span style="color:#D9D0D9"> | </span> 
									<a href="{{ route('farmer.product.edit', $farm_product->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"> </i></a> 
									<span style="color:#D9D0D9"> | </span> 
									<form action="{{ route('farmer.product.destroy', $farm_product->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure to delete ?')">
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
