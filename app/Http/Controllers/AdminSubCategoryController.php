<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Str;
use Alert;
use App\SubCategory;

class AdminSubCategoryController extends Controller
{
    //
    public function index(){
      $sub_categories = SubCategory::orderBy('created_at', 'DESC')->get();

      return view('admin.sub_category.index' , compact('sub_categories'));
    }

    public function create(){
      return view('admin.sub_category.create');
    }

    public function store(Request $request){
      $this->validate($request ,[
        'name' => 'required',
        'category_id' => 'required'
      ]);

      $sub_categories = new SubCategory;

      $sub_categories->name = $request->input('name');
      $sub_categories->slug = Str::slug($request->input('name'));
      $sub_categories->category_id =$request->input('category_id');
      $sub_categories->save();

      alert()->success('ประเภทสินค้าย่อย '. $sub_categories->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มประเภทสินค้าย่อยสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');

      return redirect()->route('admin.sub_category.index');

    }

    public function edit($id){
      $sub_category = SubCategory::find($id);

      return view('admin.sub_category.edit', compact('sub_category'));
    }

    public function update($id, Request $request){
      $sub_categories = SubCategory::find($id);

      $this->validate($request,[
        'name' => 'required|min:4' ,
        'category_id' => 'required'
      ]);

      $sub_categories->name = $request->input('name');
      $sub_categories->slug = Str::slug($request->input('name'));

      $sub_categories->save();

      alert()->success('ประเภทสินค้าย่อย '. $sub_categories->name . ' ถูกแก้ไขเรียบร้อยแล้ว' , 'แก้ไขประเภทสินค้าย่อยสำเร็จแล้ว')->persistent('ปิด');

      return redirect()->route('admin.sub_category.index');

    }

    public function destroy($id){
      $sub_category = SubCategory::find($id);

      $sub_category->delete();

      alert()->success('ประเภทสินค้าย่อย ' . $sub_category->name . ' ถูกลบเรียบร้อยแล้ว' , 'ลบประเภทสินค้าย่อยสำเร็จแล้ว')->persistent('ปิด');

      return redirect()->back();
    }
}
