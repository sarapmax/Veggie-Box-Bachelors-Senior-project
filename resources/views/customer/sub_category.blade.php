@extends('customer.layouts.category')

@section('app')
 
<div class="col-lg-9">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('products/category/'.$product_sub_categories[0]->category_slug) }}"><i class="fa fa-cube"> </i> {{ $product_sub_categories[0]->category_name }}</a>
			</li>
			<li class="active">
				<strong>{{ $product_sub_categories[0]->sub_category_name }}</strong>
			</li>
		</ol><hr/>
		@foreach($product_sub_categories as $product_sub_category)
			<div class="box col-lg-4">
				<div class="ibox">
					<div class="ibox-content product-box">
						<div style="padding: 0px;" class="product-imitation">
							<a href="{{ url('product/'.$product_sub_category->farm_product->slug) }}"><img src="{{ asset('thumb_image/'.$product_sub_category->farm_product->thumb_image)}}" style="height:150px;"></a>
						</div>
						<div class="product-desc">
							<small class="text-muted">จากฟาร์ม : <span class="btn btn-xs btn-warning btn-outline"><i class="fa fa-home"> </i> {{ $product_sub_category->farm_product->farmer->farm_name }}</span></small><br/>
							<small class="text-muted">ประเภทสินค้า : {{ $product_sub_category->farm_product->sub_category->name }}</small><hr/>
							<a href="{{ url('product/'.$product_sub_category->farm_product->slug) }}" class="product-name">{{ $product_sub_category->farm_product->name }}</a>
							<div style="padding: 10px 0;" class="m-t-xs">
								{{ discountCoinPrice($product_sub_category->price, $product_sub_category->discount_price, $product_sub_category->farm_product->unit) }}
							</div>
							<div class="small m-t-xs">
								<div class="input-group">
									<form action="{{ route('cart') }}" method="POST" style="display:inline">
										{{ csrf_field() }}
										<center>
											<input style="height: 22px;width:80px;" min="1" max="{{ $product_sub_category->quantity }}" type="number" name="qty{{ $product_sub_category->id }}" class="form-control"> 
											<input type="hidden" name="product_id" value="{{ $product_sub_category->id }}">
											<span class="input-group-btn">
												<button disabled="disabled" class="btn btn-primary btn-xs">{{ $product_sub_category->farm_product->unit }} </button>
											</span>
											@if($errors->has('qty'.$product_sub_category->id))
											<span style="color:#B12725;">กรุณาใส่จำนวนสินค้า</span><br/>
											@endif
											<br/>
											<button type="submit" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า </button>
										</center>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
			
			<div class="col-lg-12">
			@include('pagination.default', ['paginator' => $product_sub_categories])
			</div>
	</div>
</div>

@endsection