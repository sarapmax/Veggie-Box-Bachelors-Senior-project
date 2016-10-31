@extends('layouts.master')

@section('content')

<div class="col-lg-6">
    <div style="margin-bottom: 10px;"  class="row ibox-content border-box">
        <h3>
            ราคารวม
        </h3><hr/>
        <h2 class="font-bold">
            {{ Cart::total() }} <i class="fa fa-viacoin"> </i>
        </h2>
        <br/>
        <h4 class="font-bold">
            จำนวน VeggieCoin ที่มีอยู่ : <span style="color: #f7a54a ;">{{ viaCoin(Auth::guard('customer')->user()->coins) }}</span>
        </h4>
        <br/>
        <small>จำนวน VeggieCoin ไม่พอ ?</small><br/><br/>
        <a href="" class="btn btn-xs btn-outline btn-warning"> ซื้อ VeggieCoin</a>
        <hr/>
        <span class="text-muted small">
            *ราคานี้รวมภาษีมูลค่าเพิ่มแล้ว
        </span>
    </div>
	<div class="row ibox-content border-box">
        <div class="pull-left"><h3>สินค้าทั้งหมดที่คุณสั่งซื้อ</h3></div>
        <span class="pull-right">(<strong>{{ Cart::count() }}</strong>) สินค้า</span>
        <div class="clearfix"></div>
        <hr/>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table-cart table shoping-cart-table">
                    <thead>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>ราคารวม</th>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $cart)
                    <tr>
                        <td width="90">
                            <div class="cart-product-imitation">
                                 <img style="width:100px;border:1px solid #ECF2EB;" src="{{ asset('thumb_image/'.$cart->options->image) }}">
                            </div>
                        </td>
                        <td class="desc">
                            <h3>
                            <a href="#" class="text-navy">
                                {{ $cart->name }}
                            </a>
                            </h3>
                        </td>

                        <td>
                            {{ viaCoin($cart->price) }} x {{ $cart->qty }} {{ $cart->options->size }}
                        </td>
                        <td>
                            <h4>
                                {{ viaCoin($cart->subtotal) }}
                            </h4>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="col-lg-6">
    <div style="margin: 0 0 10px 0;" class="ibox-content border-box">
        <h3>กรอกข้อมูลการจัดส่งสินค้า</h3><hr/>
        <form class="form-horizontal" role="form" action="{{ url('order') }}" method="POST"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">อีเมล</label>
                <div class="col-md-10">
                    <input type="email" class="form-control" name="email" placeholder="กรอกอีเมล" value="{{ old('email', Auth::guard('customer')->user()->email) }}">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ชื่อจริง</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="firstname" placeholder="กรอกชื่อจริง" value="{{ old('firstname', Auth::guard('customer')->user()->firstname) }}">
                    @if($errors->has('firstname'))
                        <span class="help-block">{{ $errors->first('firstname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">นามสกุล</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="lastname" placeholder="กรอกนามสกุล" value="{{ old('lastname', Auth::guard('customer')->user()->lastname) }}">
                    @if($errors->has('lastname'))
                        <span class="help-block">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">เบอร์โทร</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="phone" placeholder="กรอกเบอร์โทรศัพท์"  value="{{ old('phone', Auth::guard('customer')->user()->phone) }}">
                    @if($errors->has('phone'))
                        <span class="help-block">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <hr/>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ที่อยู่</label>
                <div class="col-md-10">
                    <textarea class="form-control" rows="4" name="address" placeholder="กรอกที่อยู่">{{ old('address', Auth::guard('customer')->user()->address) }}</textarea>
                    @if($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('sub_district') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">ตำบล</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="sub_district" placeholder="กรอกตำบล"  value="{{ old('sub_district', Auth::guard('customer')->user()->sub_district) }}">
                    @if($errors->has('sub_district'))
                        <span class="help-block">{{ $errors->first('sub_district') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('district') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">อำเภอ</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="district" placeholder="กรอกอำเภอ"  value="{{ old('district', Auth::guard('customer')->user()->district) }}">
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
                        <option @if($tbl_province->name == old('province')) selected="selected" @endif @if($tbl_province->name == Auth::guard('customer')->user()->province) selected="selected" @endif value="{{ $tbl_province->name }}">{{ $tbl_province->name }}</option>
                        @endforeach
                        <option @if("อื่นๆ" == old('province')) selected="selected" @endif @if("อื่นๆ" == Auth::guard('customer')->user()->province) selected="selected" @endif value="อื่นๆ">อื่นๆ</option>
                    </select>
                    @if($errors->has('province'))
                        <span class="help-block">{{ $errors->first('province') }}</span>
                    @endif

                </div>
            </div>
            <div class="form-group {{ $errors->has('zipcode') ? 'has-error' : '' }}">
                <label for="" class="col-md-2 control-label">รหัสไปรษณีย์</label>
                <div class="col-md-10">
                    <input type="number" class="form-control" name="zipcode" placeholder="กรอกรหัสไปรษณีย์"   value="{{ old('zipcode', Auth::guard('customer')->user()->zipcode) }}">
                    @if($errors->has('zipcode'))
                        <span class="help-block">{{ $errors->first('zipcode') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">เลือกพื้นที่จัดส่ง</label>
                <div class="col-md-10">
                    <div id="map_canvas" style="width:400;height:300px;"></div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input type="hidden" name="latLng" id="latLng" value="{{ old('latLng', Auth::guard('customer')->user()->latLng) }}">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check"> </i> ยืนยันการสั่งซื้อ</button>
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
            center: new google.maps.LatLng{{ old('latLng', Auth::guard('customer')->user()->latLng) }},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        var marker = new google.maps.Marker({
            map:map,
            position: new google.maps.LatLng{{ old('latLng', Auth::guard('customer')->user()->latLng) }},
            // draggable: true
        });


        var infowindow = new google.maps.InfoWindow({
            map:map,
            content: "ที่อยู่ในการจัดส่งสินค้า",
            position:  new google.maps.LatLng{{ old('latLng', Auth::guard('customer')->user()->latLng) }}
        });


        google.maps.event.addListener(map,'click',function(event){

            infowindow.open(map,marker);
            infowindow.setContent('ที่อยู่ในการจัดส่งสินค้า');
            // event.latLng
            infowindow.setPosition(event.latLng);

            marker.setPosition(event.latLng);

            $('#latLng').val(event.latLng);
        });
    }
</script>

@endsection