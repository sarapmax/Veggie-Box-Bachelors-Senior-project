@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ข้อมูลแพคเกจเหรียญ</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
			<li class="active">
				<strong>ข้อมูลแพคเกจเหรียญ VeggieCoin</strong>
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="wrapper wrapper-content animated fadeInUp">
			<div class="ibox">
				<div class="ibox-title">
					<h5>ข้อมูลแอดมิน</h5>
					<div class="ibox-tools">
						<a href="{{ route('admin.veggiecoin.package.create') }}" class="btn btn-primary"><i class="fa fa-plus"> </i> เพิ่มแพคเกจเหรียญ</a>
					</div>
				</div>
				{{-- @if(Session::has('alert-success')) --}}

				{{-- @endif --}}
				<div class="ibox-content">
					<table class="table table-striped table-bordered table-hover " id="admin-coin" >
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อแพคเกจ</th>
								<th>จำนวนเหรียญ</th>
								<th>ราคา</th>
								<th>ราคาเพิ่มเป็นเปอร์เซน</th>
                <th>เพิ่มเมื่อ</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($coins as $coin)
							<tr>
									<td>{{ $coin->id }}</td>
									<td>{{ $coin->name }}</td>
									<td>{{ $coin->coin_amount }}</td>
									<td>{{ $coin->price }}</td>
									<td>{{ $coin->increase_percent }}%</td>
                  <td>{{ $coin->created_at }}</td>
									<td align="center">
										<a href="{{ route('admin.veggiecoin.package.edit', $coin->id) }}" class="btn btn-xs btn-primary" href=""><i class="fa fa-edit"> </i></a>
										<span style="color:#D9D0D9"> | </span>
										<form action="{{ route('admin.veggiecoin.package.destroy', $coin->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure to delete ?')">
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
	$('#admin-coin').DataTable({
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
