@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ข้อความฟาร์มเมอร์</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>ข้อความฟาร์มเมอร์</strong>
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
    <h2>
        ข้อความทั้งหมด ({{ App\FarmerInbox::count() }})
    </h2>
    <div class="mail-tools tooltip-demo m-t-md">
        @include('pagination.default', ['paginator' => $inboxes])
    </div>
</div>
    <div class="mail-box">

    <table class="table table-hover table-mail">
    <tbody>
    @foreach($inboxes as $inbox)
    <tr class="read">
        <td class="check-mail">
            {{-- {{ customerInboxStatus($inbox->status) }} --}}
            {{ $inbox->status }}
        </td>
        <td class="mail-ontact"><a href="{{ url('admin/inbox/farmer/detail/'.$inbox->slug) }}">
                {{ $inbox->farmer->farm_name }}
            </a></td>
        <td class="mail-subject"><a href="{{ url('admin/inbox/farmer/detail/'.$inbox->slug) }}">{{ $inbox->topic }}</a></td>
        <td class="text-right mail-date">{{ $inbox->created_at->format('d/m/Y H:i:s') }}</td>
    </tr>
    @endforeach
    </tbody>
    </table>


    </div>
</div>
</div>
</div>


@endsection

@section('admin-js')


@endsection
