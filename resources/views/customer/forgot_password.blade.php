@extends('customer.layouts.member')

@section('title', 'ลืมรหัสผ่าน')

@section('member')


<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3> ลืมรหัสผ่าน</h3><hr/>

		<div class="col-lg-12">
		<form action="{{ url('forgot_password') }}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
		    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		      <label class="col-md-2 control-label" for="forgot_password">อีเมลล์ :</label>
		      <div class="col-md-7">
		          <input type="text" class="form-control" name="email" placeholder="กรอกอีเมลล์ของคุณ">
		          @if($errors->has('email'))
		          	<span class="help-block">{{ $errors->first('email') }}</span>
		          @endif
		      </div>
		      <div class="col-md-2">
		          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> ยืนยัน</button>
		      </div>
		    </div>
		</form>
		</div>
	</div>
</div>


@endsection