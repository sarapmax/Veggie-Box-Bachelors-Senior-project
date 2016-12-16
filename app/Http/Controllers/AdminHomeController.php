<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use Carbon\Carbon;
use DB;
class AdminHomeController extends Controller
{
	public function index() {
		return view('admin.home.index');
	}

	public function getOrderGraph($start_date, $end_date) {
		$order_graph = Order::select(DB::raw('DATE(created_at) as date, COUNT(id) AS order_count'))
							->groupBy('date')
							->whereBetween('created_at', [
								    $start_date,
								    $end_date,
								])
							->orderBy('date', 'ASC')
							->get();
		return $order_graph;
	}

	public function getOrderMap() {
		$order_map = Order::where('order_status', 'paid')->where('latLng', '<>', '')->get();

		return $order_map;
	}

}
