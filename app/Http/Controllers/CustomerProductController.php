<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class CustomerProductController extends Controller
{
    public function getProductsPage() {
    	$products = Product::orderBy('products.created_at', 'DESC')
                            ->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
                            ->where('farm_products.status', 'release')
                            ->where('products.activated', 1)
                            ->select('farm_products.*', 'products.price AS product_price', 'products.discount_price as product_discount_price', 'products.quantity AS product_quantity', 'products.id AS product_id')
                            ->paginate(15);

    	return view('customer.products', compact('products'));
    }

    public function getProductPreorderPage() {
        $products = Product::orderBy('products.created_at', 'DESC')
                            ->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
                            ->where('farm_products.status', 'growing')
                            ->where('products.activated', 1)
                            ->select('farm_products.*', 'products.price AS product_price', 'products.discount_price as product_discount_price', 'products.quantity AS product_quantity', 'products.id AS product_id')
                            ->paginate(15);

        return view('customer.preorder_products', compact('products'));
    }

    public function getProduct($slug) {
    	$product = Product::join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    					  ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
    					  ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
    					  ->join('farmers', 'farm_products.farmer_id', '=', 'farmers.id')
    					  ->where('farm_products.slug', $slug)
    					  ->select('farm_products.*', 'products.id AS product_id', 'products.price AS product_price', 'products.discount_price AS product_discount_price', 'products.quantity AS product_quantity', 'sub_categories.name AS sub_category_name', 'categories.slug AS category_slug', 'sub_categories.slug AS sub_category_slug', 'categories.name AS category_name', 'farmers.farm_name')
    					  ->first();
        $havest_date = date('Y-m-d', strtotime($product->plant_date. ' + '.$product->grow_estimate.' days'));

        $secs = strtotime($havest_date) - strtotime(date('Y-m-d'));

        $havest['havest_date'] = $havest_date;
        $havest['havest_countdown'] = $secs / 86400;

    	return view('customer.product', compact(['product', 'havest']));
    }
}
