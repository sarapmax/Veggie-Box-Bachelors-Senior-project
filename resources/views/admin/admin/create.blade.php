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
				<a href="{{ url('admin/admin') }}">แอดมิน</a>
			</li>
			<li class="active">
				<strong>เพิ่มแอดมิน</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มแอดมิน</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/admin') }}" class="btn btn-primary"><i class="fa fa-user"> </i> จัดการแอดมิน</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ url('admin/admin/store') }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="" class="col-md-2 control-label">อีเมล</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="กรอกอีเมล" value="{{ old('email') }}">
                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('fullname') ? 'has-error' : '' }}">
                            <label for="" class="col-md-2 control-label">ชื่อ</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="fullname" placeholder="กรอกชื่อ" value="{{ old('fullname') }}">
                                @if($errors->has('fullname'))
                                    <span class="help-block">{{ $errors->first('fullname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="" class="col-md-2 control-label">รหัสผ่าน</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                                @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="" class="col-md-2 control-label">ยืนยันรหัสผ่าน</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" placeholder="กรอกรหัสผ่านอีกครั้ง">
                                @if($errors->has('password_confirmation'))
                                    <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
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