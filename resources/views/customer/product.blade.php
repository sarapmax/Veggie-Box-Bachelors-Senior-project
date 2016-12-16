@extends('layouts.master')

@section('content')

<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row border-box ibox-content">
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('products/category/'.$product->category_slug) }}">{{ $product->category_name }}</a>
			</li>
			<li>
				<a href="{{ url('products/category/'.$product->category_slug.'/'.$product->sub_category_slug) }}">{{ $product->sub_category_name }}</a>
			</li>
			<li class="active">
				<strong><i class="fa fa-cube"> </i> {{ $product->name }}</strong>
			</li>
		</ol><hr/>
		<div class="ibox product-detail">

	        <div class="row">
	            <div class="col-md-5">


	                <div style="border: 1px solid #E6E9EC;" class="product-images">

	                    <div>
	                        {{-- <div class="image-imitation"> --}}
	                            <img src="{{ asset('thumb_image_thumb/'.$product->thumb_image) }}" />
	                        {{-- </div> --}}
	                    </div>
	                    <?php $images = explode("|",$product->images); ?>
							
						@foreach(array_slice($images ,1) as $image)
						<div style=" width: 100%;height: 100%;display: table;">
							<img style="margin: auto;" src="{{ asset('images_thumb/'.$image) }}">
						</div>
						@endforeach



	                </div>

	            </div>
	            <div class="col-md-7">

	                <h2 class="font-bold m-b-xs">
	                    {{ $product->name }}
	                    <div class="pull-right">
	                    	<img style="width:130px;" src="{{ asset('img/like.png') }}">
	                    </div>
	                </h2><br/>
	                <table class="table">
	                	<tr>
	                		<th style="width:180px;">จากฟาร์ม</th>
	                		<td>
	                			<span class="btn btn-xs btn-warning btn-outline">{{ $product->farm_name }}</span>
	                		</td>
	                	</tr>
	                	<tr>
	                		<th>ข้อมูลการรับรองคุณภาพสินค้า</th>
	                		<td>
	                			<img src="{{ asset('img/cer1.jpg') }}" style="width:50px;">
	                			<img src="{{ asset('img/cer2.jpg') }}" style="width:50px;">
	                			<img src="{{ asset('img/cer3.jpg') }}" style="width:50px;">
	                		</td>
	                	</tr>
	                	<tr>
	                		<th>สถานะ</th>
	                		<td>
	                			{{ productStatus($product->status) }}
	                		</td>
	                	</tr>
	                	@if($product->grow_estimate && $product->plant_date)
	                	<tr>
	                		<th>ข้อมูลการเก็บเกี่ยว</th>
	                		<td>
	                			<label class="label label-default"> วันที่เก็บเกี่ยวโดยประมาณ : {{ $havest['havest_date'] }}</label>
										<label class="label label-default">อีกประมาณ {{ $havest['havest_countdown'] }} วันจะสามารถเก็บเกี่ยวได้</label>
	                		</td>
	                	</tr>
	                	@endif
	                </table>
	                <hr>
	                <div>

	                    {{-- <a href="{{ route('cart', $product->product_id) }}" class="btn btn-primary pull-right"><i class="fa fa-shopping-basket"> </i> หยิบใส่ตระกร้า</a> --}}
	                    <div class="pull-right input-group">
							<form action="{{ route('cart') }}" method="POST" style="display:inline">
								{{ csrf_field() }}
								<center>
									<input style="width:80px;" type="number" min="1" max="{{ $product->product_quantity }}" name="qty{{ $product->product_id }}" class="form-control"> 
									<input type="hidden" name="product_id" value="{{ $product->product_id }}">
									<span class="input-group-btn">
										<button class="btn btn-white btn-outline">{{ $product->unit }} </button>
										<button type="submit" class="btn btn-primary btn-outline"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า </button>
									</span>
									@if($errors->has('qty'.$product->product_id))
									<span style="color:#B12725;">กรุณาใส่จำนวนสินค้า</span><br/>
									@endif
								</center>
							</form>
						</div>
	                    <h3 style="color:#D61614;" class="product-main-price">{{ discountCoinPrice($product->product_price, $product->product_discount_price, $product->unit) }} <small style="color:#D61614;" class="text-muted">รวมภาษามูลค่าเพิ่มแล้ว</small> </h3>
	                </div>
	                
	            </div>
	        </div>
	        <hr/>
	        <div class="row">
	        	<div class="col-md-12">
	        		<h4>รายละเอียดสินค้า</h4><br/>

	                <div style="padding: 0 30px;" class="small text-muted">
	                    {!! $product->description !!}
	                </div>
	        	</div>
	        </div>
        </div>
	</div>

	<div class="row ibox-content border-box">
		<h3>สินค้าที่คุณอาจจะสนใจ</h3><hr/>
		@foreach(App\Product::inRandomOrder()->get()->slice(0, 3) as $product_related)
			<div class="box col-lg-4">
				<div class="ibox">
					<div class="ibox-content product-box">
						<div style="padding: 0px;" class="product-imitation">
							<a href="{{ url('product/'.$product_related->farm_product->slug) }}"><img src="{{ asset('thumb_image/'.$product_related->farm_product->thumb_image)}}" style="height:150px;"></a>
						</div>
						<div class="product-desc">
							<small class="text-muted">ประเภทสินค้า : {{ $product_related->farm_product->sub_category->name }}</small>
							<a href="{{ url('product/'.$product_related->farm_product->slug) }}" class="product-name">{{ $product_related->farm_product->name }}</a>
							<div style="padding: 10px 0;" class="m-t-xs">
								{{ discountCoinPrice($product_related->price, $product_related->discount_price, $product_related->farm_product->unit) }}
							</div>
							<div class="small m-t-xs">
								<a href="{{ route('cart', $product_related->id) }}" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>


@endsection