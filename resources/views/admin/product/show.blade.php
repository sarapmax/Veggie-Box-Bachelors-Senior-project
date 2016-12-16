@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>สินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ url('admin/product') }}">สินค้า</a>
			</li>
			<li class="active">
				<strong>{{ $product->farm_product->name }} </strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>{{ $product->farm_product->name }} </h5>
					<div class="ibox-tools">
						<a href="{{ url('admin/product') }}" class="btn btn-primary"><i class="fa fa-cubes"> </i> จัดการสินค้า</a>
					</div>
				</div>

				<div class="ibox-content">
					<div class="row">
				    	<center>
								<a href="{{ asset('thumb_image/'.$product->farm_product->thumb_image) }}" data-gallery=""><img src="{{ asset('thumb_image_thumb/'.$product->farm_product->thumb_image) }}" /></a>
				    	</center>
					</div><br/>
					<div class="row">
						<center>
							<?php $images = explode("|",$product->farm_product->images); ?>
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
									<th>จากฟาร์ม</th>
									<td>{{ $product->farm_product->farmer->farm_name }}  <a target="_blank" href="{{ url('admin/farmer/show?farmer_id='.$product->farm_product->farmer->id) }}"><i class="fa fa-external-link"> </i></a></td>
								</tr>
								<tr>
									<th style="width:150px;">ประเภทสินค้า</th>
									<td>
											{{ $product->farm_product->sub_category->category->name }}
									</td>
								</tr>
								<tr>
									<th style="width:150px;">ประเภทสินค้าย่อย</th>
									<td>
										<p>{{ $product->farm_product->sub_category->name }}</p>
									</td>
								</tr>
								<tr>
									<th>ชื่อสินค้า</th>
									<td>{{ $product->farm_product->name }}</td>
								</tr>
								<tr>
									<th>ราคา</th>
									<td>{{ discountPrice($product->price, $product->discount_price, $product->farm_product->unit) }}</td>
								</tr>
								<tr style="color: #DD3840">
									<th>ราคาส่ง</th>
									<td>{{ discountPrice($product->farm_product->price, $product->farm_product->discount_price, $product->farm_product->unit) }}</td>
								</tr>
								<tr>
									<th>จำนวน</th>
									<td>
										{{ productCheckQuantity($product->quantity, $product->farm_product->unit) }}
									</td>
								</tr>
								<tr>
									<th>รายละเอียด</th>
									<td>{!! $product->farm_product->description !!}</td>
								</tr>
								<tr>
									<th>สถานะ</th>
									<td>
									{{ productStatus($product->farm_product->status) }}
									</td>
								</tr>
								@if($product->farm_product->grow_estimate && $product->farm_product->plant_date)
								<?php
									 $havest_date = date('Y-m-d', strtotime($product->farm_product->plant_date. ' + '.$product->farm_product->grow_estimate.' days'));

						            $secs = strtotime($havest_date) - strtotime(date('Y-m-d'));

						            $havest['havest_date'] = $havest_date;
						            $havest['havest_countdown'] = $secs / 86400;
								?>
								<tr>
									<td>ข้อมูลการเก็บเกียว</td>
									<td>
										<label class="label label-default"> วันที่เก็บเกี่ยวโดยประมาณ : {{ $havest['havest_date'] }}</label>
										<label class="label label-default">อีกประมาณ {{ $havest['havest_countdown'] }} วันจะสามารถเก็บเกี่ยวได้</label>
									</td>
								</tr>
								@endif
								<tr>
									<th>วันที่นำไปขายหน้าร้าน</th>
									<td>{{ $product->updated_at->format('d/m/Y') }}</td>
								</tr>
								<tr>
									<th>แก้ไขสินค้า</th>
									<td>
										<a href="" class="btn btn-sm btn-primary" href=""><i class="fa fa-edit"> </i></a> 
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
