<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Cart;
use App\Order;
use App\OrderDetail;
use App\Customer;

class CustomerOrderController extends Controller
{
    public function getCheckout() {
		if(count(Cart::content()) > 0) {
			foreach(Cart::content() as $cart) {
				$product = Product::find($cart->id);

				if($product->quantity < $cart->qty) {
			   		return redirect('cart')->with('alert-danger', $cart->name. ' จำนวนสินค้ามีไม่พอกับจำนวนที่สั่งซื้อ');
				}	
			}
			return view('customer.checkout');
		}else {
			return redirect('cart');
		}
   }

   public function placeOrder(Request $request) {
   		$order = new Order;
   		$customer = Customer::find(auth()->guard('customer')->user()->id);

   		$this->validate($request, [
   			'email' => 'required|email',
    		'firstname' => 'required|min:4', 
    		'lastname' => 'required|min:4', 
    		'phone' => 'required|alphaNum',
    		'address' => 'required', 
    		'sub_district' => 'required', 
    		'district' => 'required', 
    		'province' => 'required', 
    		'zipcode' => 'required', 
   		]);

   		$total_coin = str_replace( ",", "", Cart::total());

   		if($customer->coins >= $total_coin) {
   			$customer->coins -= $total_coin;
   			$customer->save();

   			$order->customer_id = auth()->guard('customer')->user()->id;
	   		$order->order_number = date('dmy').'-'.time();
	   		$order->email = $request->input('email');
	   		$order->firstname = $request->input('firstname');
	   		$order->lastname = $request->input('lastname');
	   		$order->phone = $request->input('phone');
	   		$order->address = $request->input('address');
	   		$order->sub_district = $request->input('sub_district');
	   		$order->district = $request->input('district');
	   		$order->province = $request->input('province');
	   		$order->zipcode = $request->input('zipcode');
	   		$order->order_status = 'paid';
	   		$order->latLng = $request->input('latLng');

	   		$order->save();

	   		foreach(Cart::content() as $cart) {
	   			$order_detail = new OrderDetail;
				$product = Product::find($cart->id);

				$product->update([
					'quantity' => $product->quantity - $cart->qty,
				]);

				$order_detail->order_id = $order->id;
				$order_detail->product_id = $cart->id;
				$order_detail->sub_total = $cart->subtotal;
				$order_detail->quantity = $cart->qty;

				$order_detail->save();
	        }

	        Cart::destroy();

	        return redirect()->route('order_success', ['order_number' => $order->order_number])->with('alert-success', 'คุณได้ทำการสั่งซื้อสินค้าเรียบร้อยแล้ว เราจะดำเนินการจัดส่งสินค้าให้ถึงมือคุณ โดยเร็วที่สุด'); 
   		}else {
   			return redirect()->back()->with('alert-danger', 'จำนวน VeggieCoin ของคุณไม่พอในการทำการสั่งซื้อสินค้า <a href="order_coin">ซื้อ VeggieCoin</a>');
   		}
   }

    public function getOrderSuccess($order_number) {
        $order = Order::whereOrderNumber($order_number)->get();
        $total = 0;
        foreach($order as  $o) {
            foreach ($o->order_detail as $od) {
                $total += $od->sub_total;
            }
        }

        return view('customer.order_success', compact(['order', 'total']));
    }
}
