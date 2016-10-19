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
				<a href="{{ route('admin.product.index') }}">สินค้า</a>
			</li>
			<li class="active">
				<strong>แก้ไข สินค้า</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>แก้ไขสินค้า</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/product') }}" class="btn btn-primary"><i class="fa fa-cubes"> </i> จัดการสินค้า</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-lg-2 control-label"> ชื่อสินค้า</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" value="{{ $product->farm_product->name }}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ราคาสินค้า</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกราคาสินค้า" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                                @if($errors->has('price'))
                                    <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('discount_price') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label"> ลดราคา</label>
                            <div class="col-lg-6">
                                <input type="text" placeholder="ลดราคาสินค้า" name="discount_price" class="form-control" value="{{ old('discount_price', $product->discount_price) }}">
                                @if($errors->has('discount_price'))
                                    <span class="help-block">{{ $errors->first('discount_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('activated') ? 'has-error' : '' }}">
                            <label for="" class="col-md-2 control-label">สถานะ </label>
                            <div class="col-md-2">
                                <label class="radio-inline"><input @if($product->activated == 1) checked @endif type="radio" name="activated" value="1"> ถูกนำไปขายหน้าร้านแล้ว</label>
                            </div>
                            <div class="col-md-7">
                                <label class="radio-inline"><input @if($product->activated == 0) checked @endif type="radio" name="activated" value="0"> รอการเลือกสรรจากแอดมิน</label>
                            </div>
                            <div class="col-md-offset-2 col-md-5">
                            @if ($errors->has('activated'))
                                <span class="help-block">{{ $errors->first('activated') }}</span>
                            @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-2">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-check"> </i> ยืนยัน</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection