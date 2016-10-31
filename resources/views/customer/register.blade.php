@extends('customer.layouts.member')

@section('member')

<div class="col-lg-8">
	<div class="row ibox-content border-box">
		<h3><i class="fa fa-edit"> </i> สมัครสมาชิก</h3><hr/>
		<form class="form-horizontal" role="form" action="{{ url('register') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">อีเมล</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" name="email" placeholder="กรอกอีเมล" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">รหัสผ่าน</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน">
                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
             <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ยืนยันรหัสผ่าน</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="กรอกรหัสผ่านอีกครั้ง">
                    @if($errors->has('password_confirmation'))
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
            </div>
            <hr/>
            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ชื่อจริง</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="firstname" placeholder="กรอกชื่อจริง" value="{{ old('firstname') }}">
                    @if($errors->has('firstname'))
                        <span class="help-block">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">นามสกุล</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="lastname" placeholder="กรอกนามสกุล" value="{{ old('lastname') }}">
                    @if($errors->has('lastname'))
                        <span class="help-block">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">เบอร์โทร</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="phone" placeholder="กรอกเบอร์โทรศัพท์"  value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <span class="help-block">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <hr/>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ที่อยู่</label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="4" name="address" placeholder="กรอกที่อยู่">{{ old('address') }}</textarea>
                    @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('sub_district') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ตำบล</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="sub_district" placeholder="กรอกตำบล"  value="{{ old('sub_district') }}">
                    @if($errors->has('sub_district'))
                        <span class="help-block">{{ $errors->first('sub_district') }}</span>
                    @endif
                </div>
            </div>
			<div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">อำเภอ</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="district" placeholder="กรอกอำเภอ"  value="{{ old('district') }}">
                    @if($errors->has('district'))
                        <span class="help-block">{{ $errors->first('district') }}</span>
                    @endif
                </div>
            </div>
             <div class="form-group {{ $errors->has('province') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">จังหวัด</label>
                <div class="col-md-10">
                    <select class="form-control" name="province">
                        <option value="">เลือกจังหวัด</option>
                        @foreach(App\Province::orderBy('name', 'ASC')->get() as $tbl_province)
                        <option @if($tbl_province->name == old('province')) selected="selected" @endif value="{{ $tbl_province->name }}">{{ $tbl_province->name }}</option>
                        @endforeach
                        <option @if("อื่นๆ" == old('province')) selected="selected" @endif value="อื่นๆ">อื่นๆ</option>
                    </select>
                    @if($errors->has('province'))
                        <span class="help-block">{{ $errors->first('province') }}</span>
                    @endif

                </div>
            </div>
            <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">รหัสไปรษณีย์</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="zipcode" placeholder="กรอกรหัสไปรษณีย์"   value="{{ old('zipcode') }}">
                    @if($errors->has('zipcode'))
                        <span class="help-block">{{ $errors->first('zipcode') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-2 control-label">เลือกที่อยู่ของคุณ</label>
                <div class="col-md-10">
                    <div id="map_canvas" style="width:580;height:400px;"></div>
                </div>
            </div>
            <br/>
			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
                    <input type="hidden" name="latLng" id="latLng">
					<button type="submit" class="btn btn-primary"><i class="fa fa-edit"> </i> สมัครสมาชิก</button>
				</div>
			</div>
        </form>

	</div>
</div>

@endsection

@section('customer-js')

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDpdWsxjo5HJOPsERUyqQnGkgCwdtlr0HI"></script>

<script type="text/javascript">
    setupMap()

    function setupMap() { 
        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(20.045127040274046, 99.89496409893036),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        var marker = new google.maps.Marker({
            map:map,
            position: new google.maps.LatLng(20.045127040274046, 99.89496409893036),
            // draggable: true
        });


        var infowindow = new google.maps.InfoWindow({
            map:map,
            content: "ที่อยู่ของคุณ",
            position:  new google.maps.LatLng(20.045127040274046, 99.89496409893036)
        });


        google.maps.event.addListener(map,'click',function(event){

            infowindow.open(map,marker);
            infowindow.setContent('ที่อยู่ของคุณ');
            // event.latLng
            infowindow.setPosition(event.latLng);

            marker.setPosition(event.latLng);

            $('#latLng').val(event.latLng);
        });
    }
</script>

@endsection