@extends('layouts.inspinia_admin')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Category</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ route('admin.category.index') }}">ประเภทสินค้า</a>
			</li>
			<li class="active">
				<strong>เพิ่มประเภทสินค้า</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มประเภทสินค้า</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/category') }}" class="btn btn-primary"><i class="fa fa-list"> </i> จัดการประเภทสินค้า</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.category.store') }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อประเภทสินค้า</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกชื่อประเภทสินค้า" name="name" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                 <button class="btn btn-primary" type="submit"><i class="fa fa-check"> </i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection