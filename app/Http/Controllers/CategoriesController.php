<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use Illuminate\Support\Str;
use Alert;

class CategoriesController extends Controller
{
    //
    public function index(){
      $categories = Categories::orderBy('created_at', 'DESC')->get();

      return view('admin.categories.index', compact('categories'));
    }

    public function create() {
    	return view('admin.categories.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|unique:categories|min:4'
    	]);

    	$categories = new Categories;

    	$categories->name = $request->input('name');
    	$categories->slug = Str::slug($request->input('name'));

    	$categories->save();
    	
    	alert()->success('ประเภทสินค้า '. $categories->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มประเภทสินค้าสำเร็จแล้ว')->persistent('ปิด');;

    	return redirect()->route('admin.category.index');
    }
}
