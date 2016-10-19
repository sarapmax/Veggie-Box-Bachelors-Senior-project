<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class AdminProductSelectionController extends Controller
{
    public function index() {
    	$selection_products = Product::orderby('created_at', 'DESC')->where('activated', 0)->get();

    	return view('admin.product_selection.index', compact('selection_products'));
    }

    public function productSelect(Request $request) {
    	$product = Product::find($request->input('product_id'));

        $this->validate($request, [
            'price' => 'required|alphaNum|numeric|min:1'
        ]);

    	$product->price = $request->input('price');
    	$product->discount_price = $request->input('discount_price');
    	$product->activated = 1;

    	$product->save();

    	alert()->success('สินค้า '.$product->farm_product->name.' ถูกกำหนดราคาใหม่ และนำไปขายหน้าร้านแล้ว', 'เลือกสินค้าไปขายหน้าร้านเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }
}
