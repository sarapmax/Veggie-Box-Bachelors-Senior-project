@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>Farmer</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li>
				<a href="{{ url('admin/farmer') }}">Farmer</a>
			</li>
			<li class="active">
				<strong>{{ $farmer->farm_name }} ฟาร์ม</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>{{ $farmer->farm_name }} ฟาร์ม</h5>
					<div class="ibox-tools">
						<a href="{{ url('admin/farmer') }}" class="btn btn-primary"><i class="fa fa-user"> </i> Farmer</a>
					</div>
				</div>

				<div class="ibox-content">
					<div class="row">
				    	<center>
							<img src="{{ asset('farmer_file/farmer_img/'.$farmer->farm_img) }}" />
				    	</center>
					</div><br/>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped">
								<tr>
									<th style="width:150px;">อีเมล</th>
									<td>
										{{ $farmer->email }}
									</td>
								</tr>
								<tr>
									<th style="width:150px;">ชื่อ</th>
									<td>
										{{ $farmer->firstname }} {{ $farmer->lastname }}
									</td>
								</tr>
								<tr>
									<th>ชื่อฟาร์ม</th>
									<td>{{ $farmer->farm_name }}</td>
								</tr>
								<tr>
									<th>รายละเอียดฟาร์ม</th>
									<td>
										{{ $farmer->farm_desc }}
									</td>
								</tr>
								<tr>
									<th>เบอร์โทรศัพท์</th>
									<td>{{ $farmer->phone }}</td>
								</tr>
								<tr>
									<th>ที่อยู่</th>
									<td>{{ $farmer->address }} ตำบล {{ $farmer->sub_district }} อำเภอ {{ $farmer->district }} จังหวัด {{ $farmer->province }} {{ $farmer->zipcode }}</td>
								</tr>
								<tr>
									<th>สถานะ</th>
									<td>
										@if($farmer->activated)
											<label class="label label-success"><i class="fa fa-check-square-o"></i> เปิดใช้งานแล้ว</label>
										@else
											<label class="label label-default"><i class="fa fa-close"></i> ปิดใช้งาน</label>
										@endif
									</td>
								</tr>
								<tr>
									<th>การใช้งาน</th>
									<td>
										@if($farmer->activated)
										<a href="{{ url('admin/farmer/deactivate_farmer?farmer_id='.$farmer->id) }}" class="btn btn-xs btn-default"><i class="fa fa-close"> </i> ปิดใช้งาน</a>
										@else
											<a href="{{ url('admin/farmer/activate_farmer?farmer_id='.$farmer->id) }}" class="btn btn-xs btn-success"><i class="fa fa-check-square-o"> </i> เปิดใช้งาน</a>
										@endif
									</td>
								</tr>
								<tr>
									<th>หลักฐาน</th>
									<td><a target="_blank" href="{{ asset('farmer_file/farmer_vat_registration/'.$farmer->vat_registration) }}">{{ $farmer->vat_registration }}</a></td>
								</tr>
								<tr>
									<th>สมัครเมื่อ</th>
									<td>{{ $farmer->created_at->format('d/m/Y H:i:s') }}</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('admin.css')

<style type="text/css">
    .lightBoxGallery {
        text-align: center;
    }

    .lightBoxGallery img {
        margin: 5px;
    }
</style>

@endsection

@section('admin-js')
<script>
	$('#product').DataTable({
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
