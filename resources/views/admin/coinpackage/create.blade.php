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
				<a href="{{ route('admin.coinpackage.index') }}">ข้อมูลแพคเกจเหรียญ</a>
			</li>
			<li class="active">
				<strong>เพิ่มแพคเกจเหรียญ</strong>
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
                        <a href="{{ url('admin/coinpackage') }}" class="btn btn-primary"><i class="fa fa-list"> </i> ข้อมูลแพคเกจเหรียญ</a>
                    </div>
                </div>
                <div class="ibox-content">
                	<form action="{{ route('admin.coinpackage.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            
												</div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
