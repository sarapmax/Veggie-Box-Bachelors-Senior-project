@extends('layouts.master')

@section('content')
 
<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row white-bg">
		<div style="border: 7px solid #fff;" class="carousel slide" id="carousel1">
            <div class="carousel-inner">
                <div class="item active">
                    <img alt="image" class="img-responsive" src="{{ asset('img/slide.png') }}">
                </div>
            </div>
            <a data-slide="prev" href="#carousel1" class="left carousel-control">
                <span class="icon-prev"></span>
            </a>
            <a data-slide="next" href="#carousel1" class="right carousel-control">
                <span class="icon-next"></span>
            </a>
        </div>
	</div>
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<div class="col-lg-12">
			<div class="pull-left">
				<h3>ข่าวสาร</h3>
			</div>
			<div class="pull-right">
				<a href="{{ url('feed') }}" class="btn btn-primary btn-sm">ดูข่าวสารทั้งหมด</a>
			</div>
			<div class="clearfix"></div>
			<hr/>
		</div>
		@foreach(App\Feed::orderBy('created_at', 'DESC')->limit(2)->get() as $feed)
		<div class="col-lg-12">
			<div>
				<a class="link" href="{{ url('feed/'.$feed->slug) }}"><h4>{{ $feed->topic }}</h4></a>
				<p>{!! str_limit(strip_tags($feed->detail), 400) !!}</p>
				<p><i class="fa fa-user"> </i> {{ $feed->admin->fullname }} &nbsp;&nbsp;<i class="fa fa-clock-o"></i> {{ $feed->created_at->diffForHumans() }}, {{ $feed->created_at->format('d/m/Y H:i:s') }}</p>
			</div>
			<hr/>
		</div>
		@endforeach
	</div>

	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<div class="pull-left">
			<h3>สินค้าขายดี</h3>
		</div>
		<div class="pull-right">
			<a href="{{ url('products') }}" class="btn btn-primary btn-sm">ดูสินค้าทั้งหมด</a>
		</div>
		<div class="clearfix"></div><hr/>
		@foreach(App\OrderDetail::select('quantity', 'product_id', DB::raw('sum(quantity) as sum'))->orderBy('sum', 'DESC')->groupBy('product_id')->limit(4)->get() as $popularProduct)
		<div class="col-lg-3 box">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<a href="{{ url('product/'.$popularProduct->product->farm_product->slug) }}"><img src="{{ asset('thumb_image/'.$popularProduct->product->farm_product->thumb_image)}}" style="height:150px;"></a>
					</div>
					<div class="product-desc">
						<small class="text-muted">จากฟาร์ม : <span class="btn btn-xs btn-warning btn-outline"><i class="fa fa-home"> </i> {{ $popularProduct->product->farm_product->farmer->farm_name }}</span></small><br/>
						<small class="text-muted">ประเภทสินค้า : {{ $popularProduct->product->farm_product->sub_category->name }}</small><hr/>
						<a href="{{ url('product/'.$popularProduct->product->farm_product->slug) }}" class="product-name">{{ $popularProduct->product->farm_product->name }}</a>
						<div style="padding: 10px 0;" class="m-t-xs">
							{{ discountCoinPrice($popularProduct->product->price, $popularProduct->product->discount_price, $popularProduct->product->farm_product->unit) }}
						</div>
						<div class="small m-t-xs">
							<div class="input-group">
								<form action="{{ route('cart') }}" method="POST" style="display:inline">
									{{ csrf_field() }}
									<center>
										<input style="height: 22px;width:80px;" min="1" max="{{ $popularProduct->product->quantity }}" type="number" name="qty{{ $popularProduct->product->id }}" class="form-control"> 
										<input type="hidden" name="product_id" value="{{ $popularProduct->product->id }}">
										<span class="input-group-btn">
											<button disabled="disabled" class="btn btn-primary btn-xs">{{ $popularProduct->product->farm_product->unit }} </button>
										</span>
										@if($errors->has('qty'.$popularProduct->product->id))
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
	</div>
	
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<div class="pull-left">
			<h3>สินค้าล่าสุด</h3>
		</div>
		<div class="pull-right">
			<a href="{{ url('products') }}" class="btn btn-primary btn-sm">ดูสินค้าล่าสุดทั้งหมด</a>
		</div>
		<div class="clearfix"></div><hr/>
		@foreach(App\Product::orderBy('created_at', 'DESC')->limit(4)->get() as $recent_product)
		<div class="col-lg-3 box">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<a href="{{ url('product/'.$recent_product->farm_product->slug) }}"><img src="{{ asset('thumb_image/'.$recent_product->farm_product->thumb_image)}}" style="height:150px;"></a>
					</div>
					<div class="product-desc">
						<small class="text-muted">จากฟาร์ม : <span class="btn btn-xs btn-warning btn-outline"><i class="fa fa-home"> </i> {{ $recent_product->farm_product->farmer->farm_name }}</span></small><br/>
						<small class="text-muted">ประเภทสินค้า : {{ $recent_product->farm_product->sub_category->name }}</small><hr/>
						<a href="{{ url('product/'.$recent_product->farm_product->slug) }}" class="product-name">{{ $recent_product->farm_product->name }}</a>
						<div style="padding: 10px 0;" class="m-t-xs">
							{{ discountCoinPrice($recent_product->price, $recent_product->discount_price, $recent_product->farm_product->unit) }}
						</div>
						<div class="small m-t-xs">
							<div class="input-group">
								<form action="{{ route('cart') }}" method="POST" style="display:inline">
									{{ csrf_field() }}
									<center>
										<input style="height: 22px;width:80px;" min="1" max="{{ $recent_product->quantity }}" type="number" name="qty{{ $recent_product->id }}" class="form-control"> 
										<input type="hidden" name="product_id" value="{{ $recent_product->id }}">
										<span class="input-group-btn">
											<button disabled="disabled" class="btn btn-primary btn-xs">{{ $recent_product->farm_product->unit }} </button>
										</span>
										@if($errors->has('qty'.$recent_product->id))
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
	</div>
	
	<?php $i = 1; ?>
	@foreach(App\Category::orderBy('created_at', 'ASC')->limit(2)->get() as $category)
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<div class="pull-left">
			<h3><i class="fa fa-cube"> </i> {{ $category->name }}</h3>
		</div>
		<div class="pull-right">
			<a href="{{ url('products/category/'.$category->slug) }}" class="btn btn-primary btn-sm">ดู{{ $category->name }}ทั้งหมด</a>
		</div>
		<div class="clearfix"></div><hr/>
		@foreach($category->sub_category as $sub_category)
			@foreach($sub_category->farm_product->slice(0, 2) as $farm_product) 
				<div class="col-lg-3 box">
					<div class="ibox">
						<div class="ibox-content product-box">
							<div style="padding: 0px;" class="product-imitation">
								<a href="{{ url('product/'.$farm_product->slug) }}"><img src="{{ asset('thumb_image/'.$farm_product->thumb_image)}}" style="height:150px;"></a>
							</div>
							<div class="product-desc">
								<small class="text-muted">จากฟาร์ม : <span class="btn btn-xs btn-warning btn-outline"><i class="fa fa-home"> </i> {{ $farm_product->farmer->farm_name }}</span></small><br/>
								<small class="text-muted">ประเภทสินค้า : {{ $farm_product->sub_category->name }}</small><hr/>
								<a href="{{ url('product/'.$farm_product->slug) }}" class="product-name">{{ $farm_product->name }}</a>
								<div style="padding: 10px 0;" class="m-t-xs">
									{{ discountCoinPrice($farm_product->price, $farm_product->discount_price, $farm_product->unit) }}
								</div>
								<div class="small m-t-xs">
									<div class="input-group">
										<form action="{{ route('cart') }}" method="POST" style="display:inline">
											{{ csrf_field() }}
											<center>
												<input style="height: 22px;width:80px;" min="1" max="{{ $farm_product->product->quantity }}" type="number" name="qty{{ $farm_product->product->id }}" class="form-control"> 
												<input type="hidden" name="product_id" value="{{ $farm_product->product->id }}">
												<span class="input-group-btn">
													<button disabled="disabled" class="btn btn-primary btn-xs">{{ $farm_product->product->farm_product->unit }} </button>
												</span>
												@if($errors->has('qty'.$farm_product->product->id))
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
		@endforeach
	</div>
	@endforeach
</div>

@endsection