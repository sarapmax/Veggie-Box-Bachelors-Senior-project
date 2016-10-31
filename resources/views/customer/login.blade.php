@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3><i class="fa fa-user"> </i> สมาชิก</h3><hr/>
        <div class="col-lg-6">
        	<div class="ibox-content border-box">
            <p>
                ยินดีต้อนรับสู่ VeggieBox online community support agriculture
            </p>
            
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>

            <p>
                When an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>

            <p>
                <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
            </p>
            <p class="text-muted text-center">
                <small>ยังไม่ได้เป็นสามาชิก ?</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="{{ url('register') }}"><i class="fa fa-edit"> </i> สมัครสมาชิก</a>
            </div>

        </div>
        <div class="col-lg-6">
        <div class="ibox-content border-box">
        <h4><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</h4><hr/>
        <form class="m-t" role="form" action="{{ url('login') }}" method="POST">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" class="form-control" placeholder="อีเมล" name="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password">
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
             <input type="checkbox" id="remember" name="remember"> <label style="font-weight: 100;" for="remember"> &nbsp;จดจำฉันในครั้งต่อไป</label>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</button>
        </form>
        </div>
        </div>
	</div>
</div>

@endsection