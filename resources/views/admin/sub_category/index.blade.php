@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ประเภทสินค้าย่อย</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>ประเภทสินค้าย่อย</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>จัดการประเภทสินค้าย่อย</h5>
					<div class="ibox-tools">
						<a href="{{ url('admin/sub_category/create') }}" class="btn btn-primary"><i class="fa fa-plus"> </i> เพิ่มประเภทสินค้าย่อย</a>
					</div>
				</div>
				{{-- @if(Session::has('alert-success')) --}}
				
				{{-- @endif --}}
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="sub_category" >
						<thead>
							<tr>
								<th>#</th>
								<th>ประเภทสินค้า</th>
								<th>ประเภทสินค้าย่อย</th>
								<th>วันที่เพิ่ม</th>
								<th style="width:50px;"></th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($sub_categories as $sub_category)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $sub_category->category->name }}</td>
								<td>{{ $sub_category->name }}</td>
								<td>{{ date('d F Y', strtotime($sub_category->created_at)) }}</td>
								<td align="center">
									<a href="{{ route('admin.sub_category.edit', $sub_category->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"> </i></a> 
									<span style="color:#D9D0D9"> | </span> 
									<form action="{{ route('admin.sub_category.destroy', $sub_category->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure to delete ?')">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"> </i></button>
									</form>
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
	$('#sub_category').DataTable({
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
