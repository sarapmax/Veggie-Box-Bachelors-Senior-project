<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class CustomerProductController extends Controller
{
    public function getProductsPage() {
    	$products = Product::orderBy('created_at', 'DESC')->paginate(15);

    	return view('customer.products', compact('products'));
    }

    public function getProduct($slug) {
    	$product = Product::join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    					  ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
    					  ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
    					  ->join('farmers', 'farm_products.farmer_id', '=', 'farmers.id')
    					  ->where('farm_products.slug', $slug)
    					  ->select('farm_products.*', 'products.id AS product_id', 'products.price AS product_price', 'products.discount_price AS product_discount_price', 'products.quantity AS product_quantity', 'sub_categories.name AS sub_category_name', 'categories.slug AS category_slug', 'sub_categories.slug AS sub_category_slug', 'categories.name AS category_name', 'farmers.farm_name')
    					  ->first();

    	return view('customer.product', compact('product'));
    }
}
