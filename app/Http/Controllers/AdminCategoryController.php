<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Illuminate\Support\Str;
use Alert;

class AdminCategoryController extends Controller
{
    public function index(){
      $categories = Category::orderBy('created_at', 'DESC')->get();

      return view('admin.category.index', compact('categories'));
    }

    public function create() {
    	return view('admin.category.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|unique:categories'
    	]);

    	$categories = new Category;

    	$categories->name = $request->input('name');
    	$categories->slug = Str::slug($request->input('name'));

    	$categories->save();

    	alert()->success('ประเภทสินค้า '. $categories->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มประเภทสินค้าสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');;

    	return redirect()->route('admin.category.index');
    }

    public function edit($id) {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update($id, Request $request) {
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required|unique:categories|min:4'
        ]);

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        $category->save();

        alert()->success('ประเภทสินค้า '.$category->name.' ถูกแก้ไขเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect('admin/category');
    }

    public function destroy($id) {
        $category = Category::find($id);

        $category->delete();

        alert()->success('ประเภทสินค้า '.$category->name.' ถูกลบเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();

    }
}
