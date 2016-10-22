<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\FarmProduct;

class AdminProductSelectionController extends Controller
{
    public function index() {
    	$selection_products = Product::orderby('created_at', 'DESC')->where('activated', 0)->get();

    	return view('admin.product_selection.index', compact('selection_products'));
    }

    public function productSelect(Request $request) {
    	$product = Product::find($request->input('product_id'));
        $farm_product = FarmProduct::find($product->farm_product->id);

        $this->validate($request, [
            'quantity' => 'required|alphaNum|numeric|min:1',
            'price' => 'required|alphaNum|numeric|min:1'
        ]);

        if($request->input('quantity') <= $product->quantity) {
            $quantity = $product->quantity - $request->input('quantity');

            $farm_product->quantity += $quantity;
            $farm_product->save();

            $product->quantity = $request->input('quantity');
            $product->price = $request->input('price');
            $product->discount_price = $request->input('discount_price');
            $product->activated = 1;

            $product->save();

            if($product->discount_price) {
                $real_price = $product->discount_price;
            }else {
                $real_price = $product->price;
            }

            if($product->farm_product->discount_price) {
                $farm_real_price = $product->farm_product->discount_price;
            }else {
                $farm_real_price = $product->farm_product->price;
            }

            adminNotification('คุณได้เลือกสินค้า ' . $product->farm_product->name . ' จำนวน ' . $product->quantity . ' ' . $product->farm_product->unit . ' ราคา ' . $real_price . ' บาท/' . $product->farm_product->unit . 
                ' (ราคาส่ง ' . $farm_real_price . ' บาท/' . $product->farm_product->unit . ')  ไปขายหน้าร้านเรียบร้อยแล้ว', '<i class="green fa fa-2x fa-arrow-circle-o-right"></i>');

            farmerNotification($product->farm_product->farmer_id, 'สินค้า ' . $product->farm_product->name . ' จำนวน ' . $product->quantity . ' ' . $product->farm_product->unit . ' ราคา ' . $real_price . ' บาท/' . $product->farm_product->unit . 
                ' (ราคาเดิม ' . $farm_real_price . ' บาท/' . $product->farm_product->unit . ')  ของคุณ ถูกนำไปขายหน้าร้านเรียบร้อยแล้ว ', '<i class="green fa fa-2x fa-check"></i>');

            alert()->success('สินค้า '.$product->farm_product->name.' ถูกกำหนดราคาใหม่ และนำไปขายหน้าร้านแล้ว', 'เลือกสินค้าไปขายหน้าร้านเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');
        }else {
            alert()->error('จำนวนสินค้า '. $product->farm_product->name .' ('.$product
                ->quantity.') มีน้อยกว่าจำนวนที่นำสินค้าที่เลือก', 'ไม่สามารถเลือกสินค้ากลับได้', 'ล้มเหลว')->persistent('ปิด');
        }

    	return redirect()->back();
    }
}
