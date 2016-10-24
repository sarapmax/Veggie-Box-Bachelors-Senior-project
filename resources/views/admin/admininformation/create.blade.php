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
				<a href="{{ route('admin.admininformation.index') }}">ข้อมูลแอดมิน</a>
			</li>
			<li class="active">
				<strong>เพิ่มข้อมูลแอดมิน</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มข้อมูลแอดมิน</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/admininformation') }}" class="btn btn-primary"><i class="fa fa-list"> </i> จัดการข้อมูลแอดมิน</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.admininformation.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อหัวข้อ</label>
                            <div class="col-lg-6">
                            	<input type="text" placeholder="กรอกชื่อหัวข้อ" name="topic" class="form-control" value="{{ old('topic') }}">
                                @if($errors->has('topic'))
                                    <span class="help-block">{{ $errors->first('topic') }}</span>
                                @endif

															<label class="col-lg-2 control-label">เนื้อหา</label>
                              <div class="col-lg-6">
                              <textarea name="text" rows="8" cols="40" class="form-control"></textarea>
																@if($errors->has('text'))
																		<span class="help-block">{{ $errors->first('text') }} </span>
																@endif
                              </div>
                            </div>
                            <div class="col-md-2">
                                 <button class="btn btn-primary" type="submit"><i class="fa fa-check"> </i> Submit</button>
                            </div>
													</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
