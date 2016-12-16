@extends('layouts.master')

@section('content')

<div class="col-lg-9">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
        <div class="pull-left"><h3><i class="fa fa-shopping-basket"> </i> ตระกร้าสินค้าของคุณ</h3></div>
        <span class="pull-right">(<strong>{{ Cart::count() }}</strong>) สินค้า</span>
        <div class="clearfix"></div>
        <hr/>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table-cart table shoping-cart-table">
                    <thead>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>สถานะ</th>
                        <th>จำนวน</th>
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
                            <div class="m-t-sm">
                                <a href="{{ route('cart.remove', $cart->rowId) }}" class="text-muted"><i class="fa fa-trash"></i> ลบสินค้าออกจากตระกร้า</a>
                            </div>
                        </td>
                        <td>
                            {{ productStatus($cart->options->status) }}
                        </td>
                        <td>
                            <div class="input-group">
                            <form method="POST" action="{{ route('cart.update', $cart->rowId) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input style="width: 50px;" value="{{ $cart->qty }}" type="text" name="qty" class="form-control">
                            {{-- <span class="input-group-btn"> --}}
                                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                            </form>
                            {{-- </span> --}}
                            </div><br/>
                            <small>(*หน่วยเป็น {{ $cart->options->size }})</small>
                        </td>
                        <td>
                            <h4>{{ viaCoin($cart->price) }}</h4>
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
        <div class="pull-left">
            <a href="{{ url('products') }}" class="btn btn-white"><i class="fa fa-arrow-left"></i> เลือกซื้อสินค้าต่อ</a>
        </div>
        <div class="pull-right">
        <a href="{{ url('checkout') }}" class="btn btn-primary btn-outline pull-right"><i class="fa fa fa-shopping-cart"></i> เช็คเอาท์</a>
        </div>
    </div>
</div>

<div class="col-lg-3">
    <div style="margin: 0 0 10px 0;" class="ibox-content border-box">
        <h3>
            ราคารวม
        </h3><hr/>
        <h2 class="font-bold">
            {{ Cart::total() }} <i class="fa fa-viacoin"> </i>
        </h2>

        <hr/>
        <span class="text-muted small">
            *ราคานี้รวมภาษีมูลค่าเพิ่มแล้ว
        </span>
        <div class="m-t-sm">
            <a href="{{ url('checkout') }}" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-shopping-cart"></i> เช็คเอาท์</a>
        </div>
    </div>

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