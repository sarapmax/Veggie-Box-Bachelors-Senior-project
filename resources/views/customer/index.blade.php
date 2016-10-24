@extends('layouts.master')

@section('content')
 
<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row white-bg">
		<div style="border: 7px solid #fff;" class="carousel slide" id="carousel1">
            <div class="carousel-inner">
                <div class="item active">
                    <img alt="image" class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=200&txt=VeggieBox&w=1140&h=500">
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
		<div style="margin-bottom: 30px;" class="col-lg-12">
			<div class="pull-left">
				<h3>ข่าวสาร</h3>
			</div>
			<div class="pull-right">
				<a href="#" class="btn btn-primary btn-sm">ดูข่าวสารทั้งหมด</a>
			</div>
			<div class="clearfix"></div>
			<hr/>
			<div>
				<a class="link" href="#"><h4>ผักสวนครัว คือผักที่ปลูกไว้</h4></a>
				<p>ผักสวนครัว คือผักที่ปลูกไว้ในบริเวณบ้านหรือที่ว่างต่าง ๆ ในชุมชนต่าง ๆ โดยมีวัตถุประสงค์เพื่อปลูกไว้สำหรับรับประทานเองภายในครอบครัวหรือชุมชน การปลูกผักสวนครัวไว้รับประทานจะทำให้ผู้ปลูกได้รับประทานผักสดที่อุดมด้วยวิตามินและเกลือแร่ต่าง ๆ มีความมปลอดภัยจากสารเคมี ลดรายจ่ายในครัวเรือน และที่สำคัญทำให้สมาชิกในครอบครัวมีกิจกรรมร่วมกันในการปลูกผัก..</p>
				<p><i class="fa fa-user"> </i> Admin Big &nbsp;&nbsp;<i class="fa fa-clock-o"></i> Today, 2 September 2016</p>
			</div>
		</div>
		<hr/>
		<div class="col-lg-12">
			<div>
				<a class="link" href="#"><h4>ผักสวนครัว คือผักที่ปลูกไว้</h4></a>
				<p>ผักสวนครัว คือผักที่ปลูกไว้ในบริเวณบ้านหรือที่ว่างต่าง ๆ ในชุมชนต่าง ๆ โดยมีวัตถุประสงค์เพื่อปลูกไว้สำหรับรับประทานเองภายในครอบครัวหรือชุมชน การปลูกผักสวนครัวไว้รับประทานจะทำให้ผู้ปลูกได้รับประทานผักสดที่อุดมด้วยวิตามินและเกลือแร่ต่าง ๆ มีความมปลอดภัยจากสารเคมี ลดรายจ่ายในครัวเรือน และที่สำคัญทำให้สมาชิกในครอบครัวมีกิจกรรมร่วมกันในการปลูกผัก..</p>
				<p><i class="fa fa-user"> </i> Admin Big &nbsp;&nbsp;<i class="fa fa-clock-o"></i> Today, 2 September 2016</p>
			</div>
		</div>
	</div>
	{{-- <div style="margin-bottom: 10px;" class="row wrapper border-bottom white-bg page-heading">
  		<div class="col-lg-12">
  			<div class="pull-left">
  				<br/>
    			<h3>สินค้าโปรโมชั่น</h3>
    		</div>
  			<div class="pull-right">
  				<br/><a href="#" class="btn btn-primary btn-sm">ดูสินค้าโปรโมชั่นทั้งหมด</a>
    		</div>
    		<div class="clearfix"></div><hr/>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<img src="{{ asset('gallery/13.jpg')}}" style="height:150px;">
					</div>
					<div class="product-desc">
						<span class="product-price">
							100฿/กก
						</span>
						<small class="text-muted">ประเภทสินค้า : ผล้ไม้สด</small>
						<a href="#" class="product-name">แอปเปิ้ลสด</a>
						<br/>
						<div class="small m-t-xs">
							<a href="" class="btn btn-primary btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<img src="{{ asset('gallery/20.jpg')}}" style="height:150px">
					</div>
					<div class="product-desc">
						<span class="product-price">
							100฿/กก
						</span>
						<small class="text-muted">ประเภทสินค้า : ผล้ไม้สด</small>
						<a href="#" class="product-name">แอปเปิ้ลสด</a>
						<br/>
						<div class="small m-t-xs">
							<a href="" class="btn btn-primary btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<img src="{{ asset('gallery/15.jpg')}}" style="height:150px">
					</div>
					<div class="product-desc">
						<span class="product-price">
							100฿/กก
						</span>
						<small class="text-muted">ประเภทสินค้า : ผล้ไม้สด</small>
						<a href="#" class="product-name">แอปเปิ้ลสด</a>
						<br/>
						<div class="small m-t-xs">
							<a href="" class="btn btn-primary btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<img src="{{ asset('gallery/15.jpg')}}" style="height:150px">
					</div>
					<div class="product-desc">
						<span class="product-price">
							100฿/กก
						</span>
						<small class="text-muted">ประเภทสินค้า : ผล้ไม้สด</small>
						<a href="#" class="product-name">แอปเปิ้ลสด</a>
						<br/>
						<div class="small m-t-xs">
							<a href="" class="btn btn-primary btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}

	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<div class="pull-left">
			<h3>สินค้าล่าสุด</h3>
		</div>
		<div class="pull-right">
			<a href="{{ url('products') }}" class="btn btn-primary btn-sm">ดูสินค้าล่าสุดทั้งหมด</a>
		</div>
		<div class="clearfix"></div><hr/>
		@foreach(App\Product::orderBy('created_at', 'DESC')->limit(4)->get() as $recent_product)
		<div class="col-lg-3">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 0px;" class="product-imitation">
						<a href="#"><img src="{{ asset('thumb_image/'.$recent_product->farm_product->thumb_image)}}" style="height:150px;"></a>
					</div>
					<div class="product-desc">
						<small class="text-muted">ประเภทสินค้า : {{ $recent_product->farm_product->sub_category->name }}</small>
						<a href="#" class="product-name">{{ $recent_product->farm_product->name }}</a>
						<div style="padding: 10px 0;" class="m-t-xs">
							{{ discountCoinPrice($recent_product->price, $recent_product->discount_price, $recent_product->farm_product->unit) }}
						</div>
						<div class="small m-t-xs">
							<a href="{{ route('cart', $recent_product->id) }}" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	
	<?php $i = 1; ?>
	@foreach(App\Category::orderBy('created_at', 'ASC')->get() as $category)
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
				<div class="col-lg-3">
					<div class="ibox">
						<div class="ibox-content product-box">
							<div style="padding: 0px;" class="product-imitation">
								<a href="#"><img src="{{ asset('thumb_image/'.$farm_product->product->farm_product->thumb_image)}}" style="height:150px;"></a>
							</div>
							<div class="product-desc">
								<small class="text-muted">ประเภทสินค้า : {{ $farm_product->product->farm_product->sub_category->name }}</small>
								<a href="#" class="product-name">{{ $farm_product->product->farm_product->name }}</a>
								<div style="padding: 10px 0;" class="m-t-xs">
									{{ discountCoinPrice($farm_product->product->price, $farm_product->product->discount_price, $farm_product->product->farm_product->unit) }}
								</div>
								<div class="small m-t-xs">
									<a href="{{ route('cart', $farm_product->id) }}" class="btn btn-primary btn-outline btn-xs"><i class="fa fa-shopping-basket"></i> หยิบใส่ตระกร้า</a>
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