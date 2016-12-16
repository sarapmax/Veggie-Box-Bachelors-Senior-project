@extends('layouts.master')

@section('content')

<div class="col-lg-3">

   <div class="ibox float-e-margins">
        <!-- <div class="ibox-title"> -->
            
        <!-- </div> -->
        <div class="border-box ibox-content">
        	<h3>
               	ประเภทสินค้า
             </h3><hr/>
            <ul style="margin-left: -35px;" class="veg-type">
            	<li>
                    <a href="{{url('products')}}">
                    	<span class="fa fa-cubes"></span>
                        <strong> &nbsp;สินค้าทั้งหมด</strong>
                    </a>
                </li><div style="margin: 20px 0;" class="hr-line-dashed"></div>
            	<?php $i = 1; ?>
            	@foreach(App\Category::orderBy('created_at', 'ASC')->get() as $category)
                <li>
                    <a  href="{{ url('products/category/'.$category->slug) }}">
                    	<span class="fa fa-cube"></span>
                        <strong> &nbsp;{{ $category->name }}</strong>
                    </a>
                    <ul class="veg-type-sub" style="margin-top: 10px;">
                    	@foreach($category->sub_category as $sub_category)
                    	<li>
                    		<a href="{{ url('products/category/'.$category->slug.'/'.$sub_category->slug) }}"><i class="fa fa-caret-right"> </i> {{ $sub_category->name }}</a>
                    	</li>
                    	@endforeach
                    </ul>
                </li><div style="margin: 20px 0;" class="hr-line-dashed"></div>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@yield('app')

@endsection