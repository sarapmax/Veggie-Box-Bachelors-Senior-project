@extends('layouts.master')

@section('content')

<div class="col-lg-12">
	<div style="margin-bottom: 10px;" class="row ibox-content border-box">
		<h3><i class="fa fa-viacoin"></i> ซื้อ VeggieCoin</h3><hr/>
		<?php $colors = [1, 2, 3, 4, 5, 6]; ?>
		@foreach(App\CoinPackage::orderBy('price', 'ASC')->get() as $i => $coin)
		<div class="box col-lg-4">
			<div class="ibox">
				<div class="ibox-content product-box">
					<div style="padding: 100px;" class="product-imitation{{ $colors[$i] }}">
					<h1>{{ $coin->name }}</h1>
					</div>
					<div class="product-desc">
						<center>
						<h3>{{ number_format($coin->price) }} บาท แลกได้ {{ number_format($coin->coin_amount + ($coin->coin_amount * ($coin->increase_percent/100))) }} <i class="fa fa-viacoin"> </i></h3>
						<small>รับเพิ่ม {{ number_format($coin->coin_amount * ($coin->increase_percent/100)) }} <i class="fa fa-viacoin"> </i></small>
						</center>
						<br/>
						<a href="{{ url('veggiecoin/order_coin/'.$coin->id) }}" class="btn btn-white btn-block">ซื้อ VeggieCoin Package นี้</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection