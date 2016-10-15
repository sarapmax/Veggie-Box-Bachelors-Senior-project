@extends('layouts.inspinia_master')

@section('app')

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div style="color:#DDDFDF;" class="col-md-6">
            <h2 class="font-bold"><img style="width:150px;" src="{{ asset('img/veggibox_logo.png') }}"></h2>
            <hr/>
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

        </div>
        <div class="col-md-6">
            <div class="ibox-content"> 
            	<center>
                <h4><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ แอดมิน</h4><hr/>
                @if (session('error-login'))
				    <div class="alert alert-danger">
				    	<center>
				            {{session('error-login')}}
				        </center>
				    </div>
				@endif
                </center>
                <form class="m-t" role="form" action="{{ url('admin/login') }}" method="POST">
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
               <br/>
            </div>
        </div>
    </div>
    <hr/>
    <div style="color:#DDDFDF;" class="row">
        <div class="col-md-6">
            Copyright VeggieBox
        </div>
        <div class="col-md-6 text-right">
           <small>© 2016</small>
        </div>
    </div>
</div>


@endsection
