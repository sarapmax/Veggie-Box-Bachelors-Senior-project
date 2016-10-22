<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\FarmProduct;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('activated', 1)->orderBy('created_at', 'DESC')->get();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'price' => 'required|alphaNum',
            'discount_price' => 'alphaNum',
            'activated' => 'required'
        ]);

        $product = Product::find($id);

        $product->price = $request->input('price');
        $product->discount_price = $request->input('discount_price');
        $product->activated = $request->input('activated');

        $product->save();

        if($request->input('activated') == 0) {
            farmerNotification($product->farm_product->farmer_id, 'สินค้า ' . $product->farm_product->name . ' ของคุณ ถูกนำออกจากหน้าร้านเป็นการชั่วคราว ', '<i class="gray fa fa-2x fa-ban"></i>');
        }

        alert()->success('สินค้า '. $product->farm_product->name .'ถูกแก้ไขเรียบร้อยแล้ว', 'สินค้าถูกแก้ไขเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $farm_product = FarmProduct::where('id', $product->farm_product->id)->first();

        $farm_product->quantity += $product->quantity;
        $farm_product->save();

        $product->delete();

        farmerNotification($product->farm_product->farmer_id, 'สินค้า ' . $product->farm_product->name . ' ถูกปฏิเสธจากแอดมิน และถูกส่งกลับเข้าสู่ระบบของคุณแล้ว', '<i class="red fa fa-2x fa-close"></i>');

        alert()->success('สินค้า '. $product->farm_product->name .' ถูกส่งกลับไปให้ Farmer เรียบร้อยแล้ว', 'สินค้าถูกส่งกลับไปให้ Farmer แล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();

    }
}
