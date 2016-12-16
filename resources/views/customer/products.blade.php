@extends('customer.layouts.category')

@section('app')

<div class="col-lg-9">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<h3><i class="fa fa-cubes"> </i> สินค้า ทั้งหมด</h3><hr/>
		@foreach($products as $product)
		<div class="box col-lg-4">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<a href="{{ url('product/'.$product->slug) }}"><img src="{{ asset('thumb_image/'.$product->thumb_image)}}" style="height:150px;"></a>
					</div>
					<div class="product-desc">
						<small class="text-muted">สถานะ : {{ productStatus($product->status) }}</small><br/>
						{{-- <small class="text-muted">จากฟาร์ม : <span class="btn btn-xs btn-warning btn-outline"><i class="fa fa-home"> </i> {{ $product->farm_product->farmer->farm_name }}</span></small><br/> --}}
						<hr/>
						<a href="{{ url('product/'.$product->slug) }}" class="product-name">{{ $product->name }}</a>
						<div style="padding: 10px 0;" class="m-t-xs">
							{{ discountCoinPrice($product->price, $product->discount_price, $product->unit) }}
						</div>
						<div class="small m-t-xs">
							<div class="input-group">
								<form action="{{ route('cart') }}" method="POST" style="display:inline">
									{{ csrf_field() }}
									<center>
										<input style="height: 22px;width:80px;" min="1" max="{{ $product->product_quantity }}" type="number" name="qty{{ $product->product_id }}" class="form-control"> 
										<input type="hidden" name="product_id" value="{{ $product->product_id }}">
										<span class="input-group-btn">
											<button disabled="disabled" class="btn btn-primary btn-xs">{{ $product->unit }} </button>
										</span>
										@if($errors->has('qty'.$product->id))
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
		@include('pagination.default', ['paginator' => $products])
		</div>
	</div>
</div>

@endsection