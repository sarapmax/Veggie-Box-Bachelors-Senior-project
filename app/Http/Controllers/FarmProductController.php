<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FarmProduct;
use App\Subcategory;
use Illuminate\Support\Str;
use App\SubCategoryProduct;
use Alert;
use Image;
use Storage;

class FarmProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farm_products = FarmProduct::where('farmer_id', auth()->guard('farmer')->user()->id)->orderBy('created_at', 'DESC')->get();

        return view('farmer.product.index', compact('farm_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $farm_product = new FarmProduct;

        $images = '';
        $thumb_image = '';
        $list_images[] = null;

        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_ids' => 'required',
            // 'farmer_id' =>  'required',
            'name' => 'required',
            'status' => 'required',
            'price' => 'required|alpha_num',
            'discount_price' => 'alpha_num',
            'quantity' => 'required|alpha_num',
            'grow_estimate' => 'alpha_num',
            'plant_date' => 'date',
            'thumb_image' => 'required|image|max:3000',
            'unit' => 'required'
        ]);

        //product images
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach($files as $file){
                $input['filename'] = time().'.'.$file->getClientOriginalName();
                $destinationPath = 'images_thumb';

                $images = Image::make($file->getRealPath());

                $images->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['filename']);

                $destinationPath = 'images/';

                $file->move($destinationPath, $input['filename']);

                $list_images[] = $input['filename'];

            }
        }

        $all_images = implode("|", $list_images);

        // thumb_image product
        if($request->hasFile('thumb_image')) {
                $thumb = $request->file('thumb_image');

                $input['thumb_name'] = time().'.'.$thumb->getClientOriginalExtension();
                $destinationPath = 'thumb_image_thumb';

                $thumb_image = Image::make($thumb->getRealPath());

                $thumb_image->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['thumb_name']);

                $destinationPath = 'thumb_image/';

                $thumb->move($destinationPath, $input['thumb_name']);
        }

        $farm_product->farmer_id = auth()->guard('farmer')->user()->id;
        $farm_product->name = $request->input('name');
        $farm_product->status = $request->input('status');
        $farm_product->price = $request->input('price');
        $farm_product->discount_price = $request->input('discount_price');
        $farm_product->quantity = $request->input('quantity');
        $farm_product->grow_estimate = $request->input('grow_estimate');
        $farm_product->plant_date = $request->input('plant_date');
        $farm_product->description = $request->input('description');
        $farm_product->images = $all_images;
        $farm_product->thumb_image = $input['thumb_name'];
        $farm_product->unit = $request->input('unit');
        $farm_product->slug = Str::slug($request->input('name'));

        $farm_product->save();

        foreach($request->input('sub_category_ids') as $sub_category_id) {
            SubCategoryProduct::create([
                'farm_product_id' => $farm_product->id,
                'sub_category_id' => $sub_category_id,
            ]);
        }

        alert()->success('สินค้า '. $farm_product->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มสินค้าสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->route('farmer.product.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $farm_product = FarmProduct::find($id);

        $havest_date = date('Y-m-d', strtotime($farm_product->plant_date. ' + '.$farm_product->grow_estimate.' days'));

        $secs = strtotime($havest_date) - strtotime(date('Y-m-d'));

        $havest['havest_date'] = $havest_date;
        $havest['havest_countdown'] = $secs / 86400;

        // echo $havest['havest_countdown'];

        return view('farmer.product.show', compact('farm_product', 'havest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $farm_product = FarmProduct::with('sub_category')->find($id);

        echo "<script>localStorage.setItem('sub_category', JSON.stringify($farm_product->sub_category))</script>";
        return view('farmer.product.edit', compact('farm_product'));
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
                
        $farm_product = FarmProduct::find($id);

        $images = '';
        $thumb_image = '';
        $list_images[] = null;

        $this->validate($request, [
            'category_id' => 'required',
            'sub_category_ids' => 'required',
            // 'farmer_id' =>  'required',
            'name' => 'required',
            'status' => 'required',
            'price' => 'required|alpha_num',
            'discount_price' => 'alpha_num',
            'quantity' => 'required|alpha_num',
            'grow_estimate' => 'alpha_num',
            'plant_date' => 'date',
            'thumb_image' => 'image|max:3000',
            'unit' => 'required'
        ]);

        //product images
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            $imagesDelete = explode("|", $farm_product->images);
            foreach(array_slice($imagesDelete ,1) as $imageDelete) {
                unlink('images_thumb/'.$imageDelete);
                unlink('images/'.$imageDelete);
            }

            foreach($files as $file){
                $input['filename'] = time().'.'.$file->getClientOriginalName();
                $destinationPath = 'images_thumb';

                $images = Image::make($file->getRealPath());

                $images->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['filename']);

                $destinationPath = 'images/';

                $file->move($destinationPath, $input['filename']);

                $list_images[] = $input['filename'];

            }
            $all_images = implode("|", $list_images);
            $farm_product->images = $all_images;
        }

        // thumb_image product
        if($request->hasFile('thumb_image')) {

                unlink('thumb_image_thumb/'.$farm_product->thumb_image);
                unlink('thumb_image/'.$farm_product->thumb_image);

                $thumb = $request->file('thumb_image');

                $input['thumb_name'] = time().'.'.$thumb->getClientOriginalExtension();
                $destinationPath = 'thumb_image_thumb';

                $thumb_image = Image::make($thumb->getRealPath());

                $thumb_image->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['thumb_name']);

                $destinationPath = 'thumb_image/';

                $thumb->move($destinationPath, $input['thumb_name']);

                $farm_product->thumb_image = $input['thumb_name'];
        }

        $farm_product->farmer_id = 1;
        $farm_product->name = $request->input('name');
        $farm_product->status = $request->input('status');
        $farm_product->price = $request->input('price');
        $farm_product->discount_price = $request->input('discount_price');
        $farm_product->quantity = $request->input('quantity');
        $farm_product->grow_estimate = $request->input('grow_estimate');
        $farm_product->plant_date = $request->input('plant_date');
        $farm_product->description = $request->input('description');
        $farm_product->unit = $request->input('unit');
        $farm_product->slug = Str::slug($request->input('name'));

        $farm_product->save();
        foreach ($farm_product->sub_category as $sub_category) {
            $sub_category_product = SubCategoryProduct::where('farm_product_id', $farm_product->id)->delete();
        }
               
        foreach($request->input('sub_category_ids') as $sub_category_id) {
            SubCategoryProduct::create([
                'sub_category_id' => $sub_category_id,
                'farm_product_id' => $farm_product->id
            ]);
        }

        alert()->success('สินค้า '. $farm_product->name . ' แก้ไขเรียบร้อยแล้ว', 'แก้ไขสินค้าสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->route('farmer.product.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farm_product = FarmProduct::find($id);

        foreach ($farm_product->sub_category as $sub_category) {
            $sub_category_product = SubCategoryProduct::where('farm_product_id', $farm_product->id)->delete();
        }

        if($farm_product->images) {
            $imagesDelete = explode("|",$farm_product->images);
            foreach(array_slice($imagesDelete ,1) as $imageDelete) {
                unlink('images_thumb/'.$imageDelete);
                unlink('images/'.$imageDelete);
            }
        }

        if($farm_product->thumb_image) {
            unlink('thumb_image_thumb/'.$farm_product->thumb_image);
            unlink('thumb_image/'.$farm_product->thumb_image);
        }

        $farm_product->delete();

        alert()->success('สินค้า '. $farm_product->name . ' ลบเรียร้อยแล้ว', 'ลบสินค้าสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->route('farmer.product.index');
    }

    public function getSelectCategory(Request $request) {
        $sub_categories = Subcategory::whereCategoryId($request->input('category_id'))->get();

        return response()->json($sub_categories);
    }
}
