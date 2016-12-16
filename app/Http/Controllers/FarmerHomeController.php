<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FarmerOrder;
use DB;

class FarmerHomeController extends Controller
{
    public function index() {
    	return view('farmer.home.index');
    }

    public function getOrderGraph($start_date, $end_date) {
    	$order_graph = FarmerOrder::select(DB::raw('DATE(farmer_orders.created_at) as date, COUNT(farmer_orders.id) AS order_count'))
    						->join('orders', 'farmer_orders.order_id', '=', 'orders.id')
							->join('order_details', 'orders.id', '=', 'order_details.order_id')
							->join('products', 'order_details.product_id', '=', 'products.id')
							->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
							->groupBy('date')
							->where('farm_products.farmer_id', auth()->guard('farmer')->user()->id)
							->whereBetween('farmer_orders.created_at', [
								    $start_date,
								    $end_date,
								])
							->orderBy('date', 'ASC')
							->get();
		return $order_graph;
    }
}
