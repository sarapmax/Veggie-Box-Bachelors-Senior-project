@extends('layouts.inspinia_admin')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ใบรับรอง</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('farmer/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ route('farmer.certification.index') }}">ใบรับรอง</a>
			</li>
			<li class="active">
				<strong>แก้ไขใบรับรอง</strong>
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
                        <a href="{{ url('farmer/certification') }}" class="btn btn-primary"><i class="fa fa-list"> </i> จัดการใบรับรอง</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.admininformation.update' , $information->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อหัวข้อ</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกชื่อหัวข้อ" name="topic" class="form-control" value="{{ old('topic' , $information->topic) }}">
                                @if($errors->has('topic'))
                                    <span class="help-block">{{ $errors->first('topic') }}</span>
                                @endif
															<label class="col-lg-2 control-label">รายละเอียด</label>
                              <textarea name="text" class="form-control" value="" rows="8" cols="40">{{ old('text' , $information->text) }}</textarea>
																@if($errors->has('text'))
																		<span class="help-block">{{ $errors->first('text') }} </span>
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
