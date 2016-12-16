@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ข้อความ</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin') }}">หน้าแรก</a>
			</li>
            <li>
                <a href="{{ url('admin/inbox/farmer') }}">ข้อความฟาร์มเมอร์</a>
            </li>
			<li class="active">
				<strong>ส่งข้อความให้ฟาร์มเมอร์</strong>
			</li>
		</ol>
	</div>
</div>
<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-3">
    <div class="ibox float-e-margins">
        <div class="ibox-content mailbox-content">
            <div class="file-manager">
                <a class="btn btn-block btn-primary compose-mail" href="{{ url('admin/inbox/farmer/send') }}">ส่งข้อความ</a>
                <div class="space-25"></div>
                <h5>กล่องข้อความ</h5>
                <ul class="folder-list m-b-md" style="padding: 0">
                    <li><a href="{{ url('admin/inbox/farmer') }}"> <i class="fa fa-inbox "></i> กล่องข้อความ <span class="label label-primary pull-right">{{ App\FarmerInbox::count() }}</span> </a></li>
                </ul>
                <h5>ประเภทข้อความ</h5>
                <ul class="category-list" style="padding: 0">
                    <li><a href="#"> <i class="fa fa-circle text-navy"></i> ทั่วไป</a></li>
                    <li><a href="#"> <i class="fa fa-circle text-warning"></i> ข่าวสาร</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9 animated fadeInRight">
<div class="mail-box-header">
    <form action="{{ url('admin/inbox/farmer/send') }}" method="POST" role="form" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('farmer_id') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ส่งถึง</label>
            <div class="col-md-10">
                <select class="form-control" name="farmer_id">
                    <option value="all">ส่งข้อความให้ฟาร์มเมอร์ทั้งหมด</option>
                    @foreach(App\Farmer::orderBy('farm_name', 'DESC')->get() as $farmer)
                    <option value="{{ $farmer->id }}">{{ $farmer->farm_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('farmer_id'))
                    <span class="help-block">{{ $errors->first('farmer_id') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ประเภทข้อความ</label>
            <div class="col-md-10">
                <select class="form-control" name="status">
                    <option value="">เลือกประเภทข้อความ</option>
                    <option value="general">ทั่วไป</option>
                    <option value="news">ข่าวสาร</option>
                </select>
                @if($errors->has('status'))
                    <span class="help-block">{{ $errors->first('status') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">หัวข้อ</label>
            <div class="col-md-10">
                <input type="text" name="topic" class="form-control">
                @if($errors->has('topic'))
                    <span class="help-block">{{ $errors->first('topic') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ข้อความ</label>
            <div class="col-md-10">
                <textarea name="message" id="message" class="form-control"></textarea>
                @if($errors->has('message'))
                    <span class="help-block">{{ $errors->first('message') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('admin_information_id') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ข้อมูล</label>
            <div class="col-md-10">
                <select class="form-control" name="admin_information_id">
                    <option value="">เลือกข้อมูลแอดมิน</option>
                    @foreach(App\AdminInformation::orderBy('topic', 'ASC')->get() as $info)
                    <option value="{{ $info->id }}">{{ $info->topic }}</option>
                    @endforeach
                </select>
                @if($errors->has('admin_information_id'))
                    <span class="help-block">{{ $errors->first('admin_information_id') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-reply"> </i> ส่งข้อความให้ลูกค้า</button>
            </div>
        </div>
    </form>
</div>

</div>
</div>
</div>


@endsection

@section('admin-js')

<script>
    $("#message").summernote({
        height: 300
    });    
</script>

@endsection
