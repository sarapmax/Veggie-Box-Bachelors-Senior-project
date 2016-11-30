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
				<strong>รายละเอียดข้อความ</strong>
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
    <h3>
        {{ $inbox->topic }}
    </h3>
     @if($inbox->admin)
    <small>จาก : แอดมิน ถึง : {{ $inbox->customer->firstname }} {{ $inbox->customer->lastname }} </small><br/><br/>
    @else
    <small>จาก : {{ $inbox->customer->firstname }} {{ $inbox->customer->lastname }} ถึง : แอดมิน</small><br/><br/>
    @endif
    <small>เมื่อวันที่ : {{ $inbox->created_at->format('d/m/Y H:i:s') }}</small>
    <hr/>
    {!! $inbox->message !!}
</div>

</div>
</div>
</div>


@endsection

@section('admin-js')


@endsection
