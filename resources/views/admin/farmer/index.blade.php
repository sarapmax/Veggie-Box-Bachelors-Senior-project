@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ผู้ประกอบการ</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>ผู้ประกอบการ</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>จัดการ ผู้ประกอบการ</h5>
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
								<th>ชื่อฟาร์ม</th>
								<th>สถานะ</th>
								<th>วันที่เพิ่ม</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($farmers as $farmer)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $farmer->email }}</td>
								<td>{{ $farmer->firstname }} {{ $farmer->lastname }}</td>
								<td>{{ $farmer->farm_name }}</td>
								<td>
									@if($farmer->activated)
										<label class="label label-success"><i class="fa fa-check-square-o"></i> เปิดใช้งานแล้ว</label>
									@else
										<label class="label label-default"><i class="fa fa-close"></i> ปิดใช้งาน</label>
									@endif
								</td>
								<td>{{ date('d F Y', strtotime($farmer->created_at)) }}</td>
								<td style="text-align: center;">
									<a href="{{ url('admin/farmer/show?farmer_id='.$farmer->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-eye"> </i></a>
								</td>
								<td style="text-align: center;">
									@if($farmer->activated)
										<a href="{{ url('admin/farmer/deactivate_farmer?farmer_id='.$farmer->id) }}" class="btn btn-xs btn-default"><i class="fa fa-close"> </i> ปิดใช้งาน</a>
									@else
										<a href="{{ url('admin/farmer/activate_farmer?farmer_id='.$farmer->id) }}" class="btn btn-xs btn-success"><i class="fa fa-check-square-o"> </i> เปิดใช้งาน</a>
									@endif
								</td>
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
