@extends('layouts.inspinia_app')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ประเภทสินค้า</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>ประเภทสินค้า</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>จัดการประเภทสินค้า</h5>
					<div class="ibox-tools">
						<a href="{{ url('admin/category/create') }}" class="btn btn-primary"><i class="fa fa-plus"> </i> เพิ่มประเภทสินค้า</a>
					</div>
				</div>
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="category" >
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อประเภทสินค้า</th>
								<th>วันที่เพิ่ม</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>ผักสวนครัว</td>
								<td>4/09/2016</td>
							</tr>
							<tr>
								<td>2</td>
								<td>ผักสมุนไพร</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>3</td>
								<td>ผักสลัด</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>4</td>
								<td>ผักตามฤดูกาล</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>5</td>
								<td>ผลไม้</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>6</td>
								<td>ผลไม้ตามฤดูกาล</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>7</td>
								<td>ผลไม้</td>
								<td>04/09/2016</td>
							</tr>
							<tr>
								<td>8</td>
								<td>ผลไม้</td>
								<td>04/09/2016</td>
							</tr>
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
	$('#category').DataTable({
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
