@extends('layouts.master')

@section('content')


@yield('member')

<div class="col-lg-4">
	<div class="ibox-content border-box">
		<h3><i class="fa fa-user"> </i> มุมสมาชิก</h3><hr/>
		<ul class="member-link">
			<li><a href="{{ url('member/my_account') }}"><i class="fa fa-caret-right"> </i> บัญชีของฉัน</a></li>
			<li><a href="{{ url('member/orders') }}"><i class="fa fa-caret-right"> </i> การสั่งซื้อสินค้า</a></li>
			<li><a href="{{ url('member/order_coin') }}"><i class="fa fa-caret-right"> </i> การซื้อ VeggieCoin</a></li>
			<li><a href="{{ url('member/inboxs') }}"><i class="fa fa-caret-right"> </i> ข้อความ</a></li>
		</ul>
	</div>
</div>


@endsection