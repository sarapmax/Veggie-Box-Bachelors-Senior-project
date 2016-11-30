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
                <a href="{{ url('admin/inbox/customer') }}">ข้อความลูกค้า</a>
            </li>
			<li class="active">
				<strong>ส่งข้อความให้ลูกค้า</strong>
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
                <a class="btn btn-block btn-primary compose-mail" href="{{ url('admin/inbox/customer/send') }}">ส่งข้อความ</a>
                <div class="space-25"></div>
                <h5>กล่องข้อความ</h5>
                <ul class="folder-list m-b-md" style="padding: 0">
                    <li><a href="{{ url('admin/inbox/customer') }}"> <i class="fa fa-inbox "></i> กล่องข้อความ <span class="label label-primary pull-right">{{ App\CustomerInbox::count() }}</span> </a></li>
                </ul>
                <h5>ประเภทข้อความ</h5>
                <ul class="category-list" style="padding: 0">
                	<li><a href="#"> <i class="fa fa-circle text-navy"></i> ทั่วไป</a></li>
                	<li><a href="#"> <i class="fa fa-circle text-warning"></i> สอบถามปัญหา</a></li>
                    <li><a href="#"> <i class="fa fa-circle text-primary"></i> Request สินค้า </a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-9 animated fadeInRight">
<div class="mail-box-header">
    <form action="{{ url('admin/inbox/customer/send') }}" method="POST" role="form" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('customer_id') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ส่งถึง</label>
            <div class="col-md-10">
                <select class="form-control" name="customer_id">
                    <option value="">เลือกลูกค้า</option>
                    @foreach(App\Customer::orderBy('firstname', 'DESC')->get() as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->firstname }} {{ $customer->lastname }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <span class="help-block">{{ $errors->first('customer_id') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
            <label for="" class="control-label col-md-2">ประเภทข้อความ</label>
            <div class="col-md-10">
                <select class="form-control" name="status">
                    <option value="">เลือกประเภทข้อความ</option>
                    <option value="general">ทั่วไป</option>
                    <option value="question">สอบถามปัญหา</option>
                    <option value="request">Request สินค้า</option>
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
