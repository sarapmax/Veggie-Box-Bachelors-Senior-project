@extends('layouts.master')

@section('content')
 
<div class="col-lg-3">

   <div class="ibox float-e-margins">
        <!-- <div class="ibox-title"> -->
            
        <!-- </div> -->
        <div style="border: 1px #e7eaec solid;" class="ibox-content">
        	<h3>
                <i class="fa fa-check-square"> </i>
                &nbsp;&nbsp;เลือกประเภทสินค้า
             </h3><hr/>
            <ul style="margin-left: -35px;" class="veg-type">
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-1"> </span>
                         &nbsp;ผักสวนครัว
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-2"> </span>
                         &nbsp;ผักสด
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-3"> </span>
                         &nbsp;ผัก oganic
                    </a>
                </li>
                <li>
                    <a href="{{url('/home/detail')}}">
                        <span class="icon-icon-4"> </span>
                         &nbsp;ผักสมุนไพร
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-5"> </span>
                         &nbsp;ผลไม้สด
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-6"> </span>
                         &nbsp;ผมไม้ตามฤดูกาล
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-7"> </span>
                         &nbsp;ผลไม้หายาก
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-8"> </span>
                         &nbsp;ผลไม้ต่างประเทศ
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-9"> </span>
                         &nbsp;ผักต่างประเทศ
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-10"> </span>
                         &nbsp;ผักตามฤดูกาล
                    </a>
                </li>
                <li>
                    <a href="{{url('customer/home/detail')}}">
                        <span class="icon-icon-13"> </span>
                         &nbsp;ผลไม้ Healthy
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon-icon-14"> </span>
                         &nbsp;ผักสีเขียว
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon-icon-15"> </span>
                         &nbsp;ผลไม้ oganic
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-9">
	<div style="margin-bottom: 10px;" class="row wrapper border-bottom white-bg page-heading">
		<div style="margin-bottom: 30px;" class="col-lg-12">
			<div class="pull-left">
				<br/><h3>ข่าวสาร</h3>
			</div>
			<div class="pull-right">
				<br/><a href="#" class="btn btn-primary btn-sm">ดูข่าวสารทั้งหมด</a>
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
	<div style="margin-bottom: 10px;" class="row wrapper border-bottom white-bg page-heading">
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
	</div>

	<div class="row wrapper border-bottom white-bg page-heading">
  		<div class="col-lg-12">
  			<div class="pull-left">
  				<br/>
    			<h3>สินค้าล่าสุด</h3>
    		</div>
  			<div class="pull-right">
  				<br/><a href="#" class="btn btn-primary btn-sm">ดูสินค้าล่าสุดทั้งหมด</a>
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
	</div>
</div>

@endsection