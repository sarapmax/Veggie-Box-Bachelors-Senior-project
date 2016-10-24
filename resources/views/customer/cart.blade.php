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
                                <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                            </div>
                        </td>

                        <td width="65">
                            <div class="input-group">
                            <input style="width: 50px;" value="{{ $cart->qty }}" type="text" name="quantity" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"></i></button>
                            </span>
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
            <button class="btn btn-white"><i class="fa fa-arrow-left"></i> เลือกซื้อสินค้าต่อ</button>
        </div>
        <div class="pull-right">
        <button class="btn btn-primary btn-outline pull-right"><i class="fa fa fa-shopping-cart"></i> เช็คเอาท์</button>
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
            <a href="#" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-shopping-cart"></i> เช็คเอาท์</a>
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