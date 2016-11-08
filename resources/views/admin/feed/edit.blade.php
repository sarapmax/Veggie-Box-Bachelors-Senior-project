@extends('layouts.inspinia_admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-sm-4">
		<h2>ข่าวสาร</h2><br>
		<ol class="breadcrumb">
			<li>
				<a href="{{ url('admin/') }}">หน้าแรก</a>
			</li>
      <li>
        <a href="{{ url('admin/feed') }}">ข้อมูลข่าวสาร</a>
      </li>
			<li class="active">
				<strong>แก้ไขข้อมูลข่าวสาร</strong>
			</li>
		</ol>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInUp">

	         <div class="ibox">
                <div class="ibox-title">
                    <h5>เพิ่มข้อมูลข่าวสาร</h5>
                    <div class="ibox-tools">
                        <a href="{{ url('admin/feed') }}" class="btn btn-primary"><i class="fa fa-list"> </i> ข้อมูลข่าวสาร</a>
                    </div>
                </div>
								<div class="ibox-content">
                	<form action="{{ route('admin.feed.update' , $feed->id) }}" method="POST" class="form-horizontal">
												<input type="hidden" name="_method" value="PATCH">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
                        	<label class="col-lg-2 control-label"> ชื่อหัวข้อ</label>
                            <div class="col-lg-10">
                            	<input type="text" placeholder="กรอกชื่อหัวข้อข่าวสาร" name="topic" class="form-control" value="{{ old('topic' , $feed->topic) }}">
                                @if($errors->has('topic'))
                                    <span class="help-block">{{ $errors->first('topic') }}</span>
                                @endif
                            </div>
                        </div>

												<div class="form-group {{ $errors->has('detail') ? 'has-error' : '' }}">
													<label class="col-lg-2 control-label"> รายละเอียด</label>
														<div class="col-lg-10">
															<textarea name="detail" id="textarea" rows="8" cols="40" class="form-control">{{ old('detail' , $feed->detail ) }}</textarea>
															@if($errors->has('detail'))
																<span class="help-block">{{ $errors->first('detail') }}</span>
															@endif
														</div>
												</div>

												<div class="form-group">
													<div class="col-md-2 col-md-offset-2">
														<button class="btn btn-primary" type="submit"><i class="fa fa-check"> </i> Submit</button>
													</div>
												</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('admin-js')
<script>
	$('#textarea').summernote({
		height: 300
	})

</script>
@endsection
