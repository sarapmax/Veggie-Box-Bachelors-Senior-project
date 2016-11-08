<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FarmerOrder;

class FarmerOrderController extends Controller
{
    public function index() {
    	$farmer_orders = FarmerOrder::join('orders', 'farmer_orders.order_id', '=', 'orders.id')
    								->join('order_details', 'orders.id', '=', 'order_details.order_id')
    								->join('products', 'order_details.product_id', '=', 'products.id')
    								->join('farm_products', 'products.farm_product_id', '=', 'farm_products.id')
    								->where('farm_products.farmer_id', '=', auth()->guard('farmer')->user()->id)
    								->select('farm_products.*', 'farmer_orders.order_number AS order_number', 'order_details.quantity AS qty', 'farmer_orders.created_at AS order_date')
    								->orderBy('order_date', 'DESC')
    								->get();
    	return view('farmer.order.index', compact('farmer_orders'));
    }
}
