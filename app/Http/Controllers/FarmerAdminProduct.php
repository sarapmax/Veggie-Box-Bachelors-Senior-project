<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\FarmProduct;
use App\FarmerNotification;

class FarmerAdminProduct extends Controller
{
    public function index() {
    	$admin_products = Product::orderBy('created_at', 'DESC')->get();

    	return view('farmer.admin_product.index', compact('admin_products'));
    }

    public function returnProductToFarmer(Request $request) {
    	$farm_product = FarmProduct::find($request->input('farm_product_id'));
        $product = Product::where('farm_product_id', $request->input('farm_product_id'))->first();

        $this->validate($request, [
            'quantity' => 'required|alphaNum',
            'farm_product_id' => 'required',
        ]);

        if($request->input('quantity') <= $product->quantity) { 
        	$product->quantity -= $request->input('quantity');
        	$product->save();

        	$farm_product->quantity += $request->input('quantity');
        	$farm_product->save();

            farmerNotification(auth()->guard('farmer')->user()->id, 'คุณได้นำสินค้า '. $farm_product->name .' จำนวน ' . $request->input('quantity') . ' ' . $farm_product->unit .' กลับสู้ระบบเรียบร้อยแล้ว', '<i class="orange fa fa-2x fa-arrow-circle-o-left"></i>');

        	alert()->success('สินค้า '. $product->farm_product->name . ' นำสินค้ากลับเรียบร้อยแล้ว', 'นำสินค้ากลับเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');
        }else {
        	alert()->error('จำนวนสินค้า '. $product->farm_product->name .' ('.$product
                ->quantity.') มีน้อยกว่าจำนวนที่นำสินค้ากลับ', 'ไม่สามารถนำสินค้ากลับได้', 'ล้มเหลว')->persistent('ปิด');
        }

        return redirect()->back();
    }

    public function cancelAdminProduct(Request $request) {
    	$product = Product::find($request->input('product_id'));
    	$farm_product = FarmProduct::find($product->farm_product_id);

    	$farm_product->quantity += $product->quantity;
    	$farm_product->save();

    	$product->delete();

        farmerNotification(auth()->guard('farmer')->user()->id, 'คุณได้ยกเลิกสินค้า '. $product->farm_product->name .' จำนวน ' . $product->quantity . ' ' . $product->farm_product->unit .' ที่ส่งให้แอดมินเรียบร้อยแล้ว', '<i class="gray fa fa-2x fa-close"></i>');

    	alert()->success('สินค้า '. $product->farm_product->name . ' ถูกยกเลิกเรียบร้อยแล้ว', 'สินค้าถูกยกเลิกเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }
}
