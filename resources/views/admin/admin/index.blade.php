@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>แอดมิน</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>แอดมิน</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>จัดการแอดมิน</h5>
					<div class="ibox-tools">
						<a href="{{ url('admin/admin/create') }}" class="btn btn-primary"><i class="fa fa-plus"> </i> เพิ่มแอดมิน</a>
					</div>
				</div>
				{{-- @if(Session::has('alert-success')) --}}
				
				{{-- @endif --}}
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="admin" >
						<thead>
							<tr>
								<th>#</th>
								<th>อีเมล</th>
								<th>ชื่อ</th>
								<th>วันที่เพิ่ม</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($admins as $admin)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $admin->email }}</td>
								<td>{{ $admin->fullname }}</td>
								<td>{{ date('d F Y', strtotime($admin->created_at)) }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('admin-js')
<script>
	$('#admin').DataTable({
		"oLanguage": {
        	"sLengthMenu": "แสดง _MENU_ Record ต่อหน้า",
        	"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
        	"sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ Entries",
        	"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        	"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        	"sSearch": "ค้นหา :"
        }
	});
</script>
@endsection
