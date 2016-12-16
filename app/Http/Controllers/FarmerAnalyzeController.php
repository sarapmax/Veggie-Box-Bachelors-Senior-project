<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\OrderDetail;
use DB;
use Carbon\Carbon;

class FarmerAnalyzeController extends Controller
{
    public function index() {
    	$product_top_sell = OrderDetail::select(DB::raw("sum(order_details.quantity) AS product_top_seller, farm_products.name AS product_name, sub_categories.name AS sub_category_name, categories.name AS category_name, farm_products.unit, products.id"))
    						  ->join('products', 'order_details.product_id', '=', 'products.id')
    						  ->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    						  ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
    						  ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
					          ->orderBy("product_top_seller", 'DESC')
					          ->groupBy(DB::raw("product_id"))
					          ->whereBetween('order_details.created_at', [
								    Carbon::now()->startOfYear(),
								    Carbon::now()->endOfYear(),
								])
					          // ->limit(15)
					          ->get();

		return view('farmer.analyze.index', compact('product_top_sell'));
    }

    public function getTopProductSeller($start_date, $end_date) {
    	$product_top_week_detail = OrderDetail::select(DB::raw("sum(order_details.quantity) AS product_top_seller, farm_products.name AS 					  product_name, sub_categories.name AS sub_category_name, categories.name AS category_name, farm_products.unit, products.id"))
    						  ->join('products', 'order_details.product_id', '=', 'products.id')
    						  ->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    						  ->join('sub_categories', 'farm_products.sub_category_id', '=', 'sub_categories.id')
    						  ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
					          ->orderBy("product_top_seller", 'DESC')
					          ->groupBy(DB::raw("product_id"))
					          ->whereBetween('order_details.created_at', [
								    $start_date,
								    $end_date,
								])
					          ->limit(15)
					          ->get();

		$product_top_week = $product_top_week_detail->toArray();		          

		$product_top_week_count = array_column($product_top_week, 'product_top_seller');
		$product_top_week_name = array_column($product_top_week, 'product_name');

    	return response()->json(['count' => $product_top_week_count, 'name' => $product_top_week_name, 'product_top_details' => $product_top_week_detail]);
    }

    public function getTopSellDate($product_id) {
    	$order_graph = OrderDetail::select(DB::raw('MONTH(created_at) as month, SUM(quantity) AS product_count'))
							->groupBy('product_id')
							->groupBy('month')
							->orderBy('month', 'ASC')
							->where('product_id', $product_id)
							->get();

		return $order_graph;
    }
}
