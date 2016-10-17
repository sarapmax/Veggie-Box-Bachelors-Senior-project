@extends('layouts.inspinia_farmer')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>สินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ url('farmer/product') }}">สินค้า</a>
			</li>
			<li class="active">
				<strong>{{ $farm_product->name }}</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>{{ $farm_product->name }}</h5>
					<div class="ibox-tools">
						<a href="{{ url('farmer/product') }}" class="btn btn-primary"><i class="fa fa-cubes"> </i> สินค้าทั้งหมด</a>
					</div>
				</div>

				<div class="ibox-content">
					<div class="row">
				    	<center>
								<a href="{{ asset('thumb_image/'.$farm_product->thumb_image) }}" data-gallery=""><img src="{{ asset('thumb_image_thumb/'.$farm_product->thumb_image) }}" /></a>
				    	</center>
					</div><br/>
					<div class="row">
						<center>
							<?php $images = explode("|",$farm_product->images); ?>
							<div class="lightBoxGallery">
							@foreach(array_slice($images ,1) as $image)
								<a href="{{ asset('images/'.$image) }}" data-gallery=""><img style="width:120px;" src="{{ asset('images_thumb/'.$image) }}"></a>
							@endforeach
							</div>

							
						</center>
					</div><br/>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<tr>
									<th style="width:150px;">ประเภทสินค้า</th>
									<td>
										@foreach($farm_product->sub_category->slice(0, 1) as $sub_category)
											{{ $sub_category->category->name }}
										@endforeach
									</td>
								</tr>
								<tr>
									<th style="width:150px;">ประเภทสินค้าย่อย</th>
									<td>
										@foreach($farm_product->sub_category as $sub_category)
										<p>- {{ $sub_category->name }}</p>
										@endforeach
									</td>
								</tr>
								<tr>
									<th>ชื่อสินค้า</th>
									<td>{{ $farm_product->name }}</td>
								</tr>
								<tr>
									<th>ราคา</th>
									@if($farm_product->discount_price)
									<td>
										<p style="color: #999;text-decoration: line-through;">{{ number_format($farm_product->price) }} บาท / {{ $farm_product->unit }}</p>
										<p>{{ number_format($farm_product->discount_price) }} บาท / {{ $farm_product->unit }}</p>
									</td>
									@else
									<td>{{ number_format($farm_product->price) }} บาท / {{ $farm_product->unit }}</td>
									@endif
								</tr>
								<tr>
									<th>จำนวน</th>
									<td>
										{{ productCheckQuantity($farm_product->quantity, $farm_product->unit) }}
									</td>
								</tr>
								<tr>
									<th>รายละเอียด</th>
									<td>{!! $farm_product->description !!}</td>
								</tr>
								<tr>
									<th>สถานะ</th>
									<td>
									@if($farm_product->status == 'release')
										<label class="label label-success"><i class="fa fa-check"> </i> พร้อมขาย</label>
									@endif
									@if($farm_product->status == 'growing')
										<label class="label label-warning"><i class="fa fa-spinner fa-spin"> </i> กำลังเติบโต</label>
									@endif
								</td>
								</tr>
								@if($farm_product->grow_estimate && $farm_product->plant_date)
								<tr>
									<td>ข้อมูลการเก็บเกียว</td>
									<td>
										<label class="label label-default"> วันที่เก็บเกี่ยวโดยประมาณ : {{ $havest['havest_date'] }}</label>
										<label class="label label-default">อีกประมาณ {{ $havest['havest_countdown'] }} วันจะสามารถเก็บเกี่ยวได้</label>
									</td>
								</tr>
								@endif
								<tr>
									<th>เพิ่มเมือ</th>
									<td>{{ $farm_product->created_at->format('d/m/Y H:i:s') }}</td>
								</tr>
								<tr>
									<th>แก้ไขเมื่อ</th>
									<td>{{ $farm_product->updated_at->format('d/m/Y H:i:s') }}</td>
								</tr>
								<tr>
									<th>แก้ไขสินค้า</th>
									<td>
										<a href="{{ route('farmer.product.edit', $farm_product->id) }}" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"> </i></a> 
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('admin.css')

<style type="text/css">
    .lightBoxGallery {
        text-align: center;
    }

    .lightBoxGallery img {
        margin: 5px;
    }
</style>

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
