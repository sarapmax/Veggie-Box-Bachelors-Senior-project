<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CoinPackage;
use App\Customer;
use App\OrderCoin;

class CustomerCoinController extends Controller
{
    public function getVeggiecion() {
    	return view('customer.coin');
    }

    public function orderCoin($coin_id) {
    	$coin = CoinPackage::find($coin_id);

    	return view('customer.order_coin', compact('coin'));
    }

    public function postOrderCoin(Request $request) {
    	$this->validate($request, [
    		'coin' => 'required',
    	]);

    	$customer = Customer::find(auth()->guard('customer')->user()->id);
    	$coin_package = CoinPackage::find($request->input('coin_package_id'));

    	$order_coins = new OrderCoin;
    	$order_coins->coin_package_id = $request->input('coin_package_id');
    	$order_coins->customer_id = auth()->guard('customer')->user()->id;
    	$order_coins->status = 'paid';
    	$order_coins->payment_slip = 'no';

    	$order_coins->save();

    	$customer->coins += $coin_package->coin_amount + ($coin_package->coin_amount * ($coin_package->increase_percent/100));
    	$customer->save();

    	return redirect('member/my_account')->with('alert-success', 'คุณซื้อเหรียญ VeggieCoin เรียบร้อยแล้ว ตอนนี้จำนวน VeggieCoin ของคุณมีอยู่ <strong>'. number_format($customer->coins).'</strong>');
    }
}
