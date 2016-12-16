@extends('layouts.master')

@section('content')

<div class="col-lg-9">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <div><h3><i class="fa fa-shopping-cart"> </i> สั่งซื้อ VeggieCoin</h3></div>
        <hr/>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table-cart table shoping-cart-table">
                    <thead>
                        <th>แพ็คเกจ</th>
                        <th>ราคา</th>
                        <th>จำนวน coin ที่ได้รับ</th>
                        <th>รับเพิ่ม</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ $coin->name }}
                        </td>
                        <td>
                            {{ $coin->price }} บาท
                        </td>
                        <td>
                            {{ number_format($coin->coin_amount + ($coin->coin_amount * ($coin->increase_percent/100))) }} <i class="fa fa-viacoin"> </i>
                        </td>
                        <td>
                            {{ number_format($coin->coin_amount * ($coin->increase_percent/100)) }} <i class="fa fa-viacoin"> </i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <form action="{{ url('veggiecoin/order_coin') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="coin_package_id" value="{{ $coin->id }}">
    <div style="margin: 0 0 10px 0;" class="ibox-content border-box">
        <h3>
            วิธีการชำระเงิน
        </h3><hr/>
        <div class="form-group">
            <input type="radio" id="paypal" name="coin"> <label for="paypal"> <img style="width:25px;" src="{{ asset('img/paypal.png') }}"> Paypal Account</label>
        </div>
        <div class="form-group">
            <input type="radio" id="truemoney" name="coin"> <label for="truemoney"> <img style="width:100px;" src="{{ asset('img/truemoney.png') }}"></label>
        </div>
        <div class="form-group">
            <input type="radio" id="credit-cart" name="coin"> &nbsp;&nbsp;<label for="credit-cart"> <img style="width:150px;" src="{{ asset('img/credit-cart.gif') }}"></label>
        </div>
        <div class="form-group">
            <input type="radio" id="bank-transfer" name="coin"> &nbsp;&nbsp;<label for="bank-transfer"> Blank Transfer</label>
        </div>
        @if($errors->has('coin'))
            <span style="color:#B12725;">{{ $errors->first('coin') }}</span>
        @endif
    </div> 

    <div style="margin: 0 0 10px 0;" class="ibox-content border-box">
        <h3>
            ราคารวม
        </h3><hr/>
        <h2 class="font-bold">
            {{ number_format($coin->price) }} บาท
        </h2>
        <span class="text-muted small">
            *ราคานี้รวมภาษีมูลค่าเพิ่มแล้ว
        </span>
        <div class="m-t-sm">
            <button type="submit" class="btn btn-primary btn-block btn-sm btn-outline"><i class="fa fa-check"></i> ยืนยันการสั่งซื้อ</button>
        </div>
    </div>
    </form>

    <div class="ibox-content border-box">
        <h3>ช่วยเหลือ</h3><hr/>
        <div class="text-center">
            <h3><i class="fa fa-phone"></i> 086 234 3145</h3>
            <span class="small">
                หากคุณมีข้อสงสัยติดต่อเราได้ตลอด 24 ชั่วโมง
            </span>
        </div>
    </div>
</div>




@endsection