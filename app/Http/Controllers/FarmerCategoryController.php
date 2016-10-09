<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\SubCategory;

class FarmerCategoryController extends Controller
{
    public function getCategory() {
    	$categories = Category::orderBy('created_at', 'DESC')->get();

    	return view('farmer.category.index', compact('categories'));
    }

    public function getSubCategory() {
    	$sub_categories = SubCategory::orderby('created_at', 'DESC')->get();

    	return view('farmer.sub_category.index', compact('sub_categories'));
    }
}
