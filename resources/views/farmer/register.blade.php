@extends('layouts.inspinia_master')

@section('app')

<div style="padding: 40px 20px 20px 20px;" class="loginColumns animated fadeInDown">
    <div class="row">

        <div style="color:#DDDFDF;text-align: center;" class="col-md-12">
            <h2 class="font-bold"><img style="width:150px;" src="{{ asset('img/veggibox_logo.png') }}"></h2><br/>
        </div>
        <div class="col-md-offset-1 col-md-10">
            <div class="ibox-content"> 
                <center>
                <h4><i class="fa fa-edit"> </i> สมัครสมาชิก ผู้ประกอบการ</h4><br/>
                </center>
                <form class="form-horizontal" role="form" action="{{ url('farmer/register') }}" method="POST"  enctype="multipart/form-data">
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
                    <div class="form-group {{ $errors->has('farm_name') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">ชื่อฟาร์ม</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="farm_name" placeholder="กรอกชื่อฟาร์ม"   value="{{ old('farm_name') }}">
                            @if($errors->has('farm_name'))
                                <span class="help-block">{{ $errors->first('farm_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('farm_desc') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">รายละเอียดฟาร์ม</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="4" name="farm_desc" placeholder="กรอกรายละเอียดฟาร์มโดยย่อ">{{ old('farm_desc') }}</textarea>
                            @if($errors->has('farm_desc'))
                                <span class="help-block">{{ $errors->first('farm_desc') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('farm_img') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">รูปภาพฟาร์ม</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control" name="farm_img">
                            @if($errors->has('farm_img'))
                                <span class="help-block">{{ $errors->first('farm_img') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">ที่อยู่</label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="address" placeholder="กรอกที่อยู่">{{ old('address') }}</textarea>
                            @if($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('sub_district') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">ตำบล</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="sub_district" placeholder="กรอกตำบล"   value="{{ old('sub_district') }}">
                            @if($errors->has('sub_district'))
                                <span class="help-block">{{ $errors->first('sub_district') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                        <label for="" class="col-md-2 control-label">อำเภอ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="district" placeholder="กรอกอำเภอ"   value="{{ old('district') }}"> 
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
                    <hr/>
                    <div class="form-group {{ $errors->has('vat_registration') ? 'has-error' : '' }}">
                        <label style="text-align: center;" for="" class="col-md-12 control-label">หลักฐานยื่นยันฟาร์ม : กรมสรรพากร ในทะเบียนภาษีมูลค่าเพิ่ม (ภ.พ. 20) </label>
                        <div class="col-md-12">
                            <br/>
                            <input type="file" class="form-control" name="vat_registration">
                            @if($errors->has('vat_registration'))
                                <span class="help-block">{{ $errors->first('vat_registration') }}</span>
                            @endif
                        </div>
                    </div><br/>
                    <button type="submit" class="btn btn-primary block full-width m-b"><i class="fa fa-edit"> </i> สมัครสมาชิก</button>

                    <p class="text-muted text-center">
                        <small>เป็นสมาชิกอยู่แล้ว ?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="{{ url('farmer/login') }}"><i class="fa fa-sign-in"> </i> เข้าสู่ระบบ</a>
                </form>
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
