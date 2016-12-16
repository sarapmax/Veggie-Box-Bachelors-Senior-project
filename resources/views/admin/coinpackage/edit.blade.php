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
				<a href="{{ route('admin.veggiecoin.package.index') }}">ข้อมูลแพคเกจเหรียญ</a>
			</li>
			<li class="active">
				<strong>แก้ไขข้อมูล</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มแพคเกจเหรียญ</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/veggiecoin/package') }}" class="btn btn-primary"><i class="fa fa-list"> </i> ข้อมูลแพคเกจเหรียญ</a>
                    </div>
                </div>
								<div class="ibox-content">
                	<form action="{{ route('admin.veggiecoin.package.update' , $coin->id) }}" method="POST" class="form-horizontal">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อแพคเกจ</label>
                            <div class="col-lg-10">
                            	<input type="text" placeholder="กรอกชื่อแพคเกจ" name="name" class="form-control" value="{{ old('name' , $coin->name) }}">
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

												<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
													<label class="col-lg-2 control-label"> จำนวนเหรียญ</label>
														<div class="col-lg-10">
															<input type="number" placeholder="กรอกจำนวนเหรียญ" name="coin_amount" class="form-control" value="{{ old('coin_amount' , $coin->coin_amount) }}" />
															@if($errors->has('coin_amount'))
																<span class="help-block">{{ $errors->first('coin_amount') }}</span>
															@endif
														</div>
												</div>

												<div class="form-group {{ $errors->has('coin_amount' ? 'has-error' : '')}}">
													<label class="col-lg-2 control-label"> ราคา</label>
													<div class="col-lg-10">
														<input type="number" placeholder="กรอกราคาแพคเกจเหรียญ" name="price" class="form-control" value="{{ old('price' , $coin->price) }}" >
													</div>
												</div>

												<div class="form-group {{ $errors->has('increase_percent' ? 'has-error' : '') }}">
													<label class="col-lg-2 control-label"> เพิ่มเปอร์เซน</label>
													<div class="col-lg-10">
														<input type="number" placeholder="กรอกเพิ่มเปอร์เซน" name="increase_percent" class="form-control" value="{{ old('increase_percent' , $coin->increase_percent) }}"/>
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
