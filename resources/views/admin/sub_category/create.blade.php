@extends('layouts.inspinia_admin')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ประเภทสินค้าย่อย</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ route('admin.sub_category.index') }}">ประเภทสินค้าย่อย</a>
			</li>
			<li class="active">
				<strong>เพิ่มประเภทสินค้าย่อย</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มประเภทสินค้าย่อย</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/sub_category') }}" class="btn btn-primary"><i class="fa fa-list"> </i> จัดการประเภทสินค้าย่อย</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.sub_category.store') }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                            <label class="col-lg-2 control-label"> เลือกประเภทสินค้า</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="category_id">
                                    <option value="">เลือกประเภทสินค้า</option>
                                    @foreach(App\Category::orderBy('created_at', 'DESC')->get() as $category)
                                    <option @if(old('category_id') == $category->id) selected="selected" @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อประเภทสินค้า</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกประเภทสินค้าย่อย" name="name" class="form-control" value="{{ old('name') }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-2">
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