<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SubCategories;

class SubCategoriesController extends Controller
{
    //
    public function index(){
      $sub_categories = SubCategories::all();
      return view('admin.sub_categories.index' , compact('sub_categories'));
      //echo json_encode($sub_categories);
    }

    public function create(){
      return view('admin.sub_categories.create');
    }

    public function store(Request $request){
      $this->validate($request ,[
        'name' => 'required|unique:sub_categories|min:4',
        'category_id' => 'required'
      ]);

      $sub_categories = SubCategories ;

      $sub_categories->name = $request->input('name');
      $sub_categories->slug = Str::slug($request->input('name'));
      $sub_categories->category_id =$request->input('category_id');
      $sub_categories = save();

      alert()->success('ประเภทสินค้าย่อย '. $sub_categories->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มประเภทสินค้าย่อยสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');

      return redirect()->route('admin.sub_categories.index');

    }

    public function edit($id){
      $sub_categories = SubCategories::find($id);

      return view('admin.sub_categories.edit', compact('sub_categories'));
    }

    public function update(Request $request){
      $sub_categories = SubCategories::find($id);

      $this->validate($request,[
        'name' => 'required|unique:sub_categories|min:4' ,
        'category_id' => 'required'
      ]);

      $sub_categories->name = $request->input('name');
      $sub_categories->slug = Str::slug($request->input('name'));

      $sub_categories = save();

      alert()->success('ประเภทสินค้าย่อย'. $sub_categories->name . 'ถูกแก้ไขเรียบร้อยแล้ว' , 'สำเร็วจ')->persistent('ปิด');

      return rediriect()->route('admin.sub_categories.index');

    }

    public function destroy($id){
      $sub_categories = SubCategories::find($id);

      $sub_categories->delete();

      alert()->success('ประเภทสินค้าย่อย' . $sub_categores->name . 'ถูกลบเรียบร้อยแล้ว' , 'สำเร็จ')->persistent('ปิด');

      return redirect()->back();
    }
}
