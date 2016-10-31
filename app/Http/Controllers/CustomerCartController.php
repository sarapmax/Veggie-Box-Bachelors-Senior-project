<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use Cart;

class CustomerCartController extends Controller
{
    public function index() {
    	return view('customer.cart');
    }

    public function addCart($product_id) {
    	$product = Product::find($product_id);

      	$product_price = 0;

      	if($product->discount_price) {
         	$product_price = $product->discount_price;
      	}else {
         	$product_price = $product->price;
      	}

	    Cart::add([
	        'id' => $product->id,
	        'name' => $product->farm_product->name,
	        'qty' => 1,
	        'price' => bahtToCoin($product_price),
	        'options' => [
	        	'image' => $product->farm_product->thumb_image,
	            'size' => $product->farm_product->unit
	        ]
	    ]);

      return redirect()->back()->with('alert-success', 'สินค้า '. $product->farm_product->name .' ถูกเพิ่มใส่ตระกร้าสินค้าเรียบร้อยแล้ว <a href="'.url('/cart').'">ไปที่ตระกร้าสินค้า</a>');
    }

    public function updateCart($rowId, Request $request) {
      Cart::update($rowId, $request->input('qty'));

      return redirect()->back()->with('alert-success', 'จำนวนสินค้าอัพเดทเรียบร้อยแล้ว');
    }

    public function removeCart($rowId) {
      Cart::remove($rowId);

      return redirect()->back()->with('alert-success', 'สินค้าถูกลบออกไปจากตระกร้าสินค้าแล้ว');
   }
}
