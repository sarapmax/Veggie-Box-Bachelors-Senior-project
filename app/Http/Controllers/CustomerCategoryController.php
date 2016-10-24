<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class CustomerCategoryController extends Controller
{
    public function getProductByCategory($category) {
    	$product_categories = Product::join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
				    			   ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
				    			   ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
				    			   ->where('categories.slug', $category)
				    			   ->select('products.*', 'categories.name AS category_name')
				    			   ->paginate(15);

    	return view('customer.category', compact('product_categories'));
    }

    public function getProductBySubCategory($category, $sub_category) {
        $product_sub_categories = Product::join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
                                   ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
                                   ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                                   ->where('sub_categories.slug', $sub_category)
                                   ->select('products.*', 'categories.name AS category_name', 'sub_categories.name AS sub_category_name', 'categories.slug AS category_slug')
                                   ->paginate(15);

        return view('customer.sub_category', compact('product_sub_categories'));
    	
    }
}
