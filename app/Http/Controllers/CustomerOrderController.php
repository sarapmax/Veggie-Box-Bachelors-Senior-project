<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Cart;
use App\Order;
use App\OrderDetail;
use App\Customer;
use App\PreOrder;
use App\PreOrderDetail;

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
	   			$product = Product::find($cart->id);

				$product->update([
					'quantity' => $product->quantity - $cart->qty,
				]);

	   			if($cart->options->status == 'release') {
	   				$order_detail = new OrderDetail;

	   				$order_detail->order_id = $order->id;
					$order_detail->product_id = $cart->id;
					$order_detail->sub_total = $cart->subtotal;
					$order_detail->quantity = $cart->qty;

					$order_detail->save();
	   			}

	   			if($cart->options->status == 'growing') {
	   				$pre_order_detail = new PreOrderDetail;
	   				$pre_order = new PreOrder;

	   				$pre_order->customer_id = auth()->guard('customer')->user()->id;
			   		$pre_order->order_number = date('ydm').'-'.time();
			   		$pre_order->email = $request->input('email');
			   		$pre_order->firstname = $request->input('firstname');
			   		$pre_order->lastname = $request->input('lastname');
			   		$pre_order->phone = $request->input('phone');
			   		$pre_order->address = $request->input('address');
			   		$pre_order->sub_district = $request->input('sub_district');
			   		$pre_order->district = $request->input('district');
			   		$pre_order->province = $request->input('province');
			   		$pre_order->zipcode = $request->input('zipcode');
			   		$pre_order->order_status = 'paid';
			   		$pre_order->latLng = $request->input('latLng');

			   		$pre_order->save();

	   				$pre_order_detail->order_id = $pre_order->id;
					$pre_order_detail->product_id = $cart->id;
					$pre_order_detail->sub_total = $cart->subtotal;
					$pre_order_detail->quantity = $cart->qty;

					$pre_order_detail->save();
	   			}

	        }

	        Cart::destroy();

	        return redirect()->route('order_success', ['order_number' => $order->order_number])->with('alert-success', 'คุณได้ทำการสั่งซื้อสินค้าเรียบร้อยแล้ว คุณจะได้รับสินค้าภายในวันนี้ เวลา 19.00 น. โดยประมาณ'); 
   		}else {
   			return redirect()->back()->with('alert-danger', 'จำนวน VeggieCoin ของคุณไม่พอในการทำการสั่งซื้อสินค้า <a href="veggiecoin">ซื้อ VeggieCoin</a>');
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
