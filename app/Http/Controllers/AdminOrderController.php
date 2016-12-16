<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Order;
use App\FarmerOrder;
use App\PreOrder;
use App\PreOrderDetail;

class AdminOrderController extends Controller
{
    public function index() {
    	$orders = Order::orderBy('created_at', 'DESC')->get();

    	return view('admin.order.index', compact('orders'));
    }

    public function getPreOrder() {
        $orders = PreOrder::orderBy('created_at', 'DESC')->get();

        return view('admin.order.pre-order', compact('orders'));
    }

    public function getPreOrderDetail($order_id) {
        $order = PreOrder::find($order_id);

        return view('admin.order.pre-order-detail', compact('order'));
    }

    public function getOrderDetail($order_id) {
    	$order = Order::find($order_id);

    	return view('admin.order.detail', compact('order'));
    }

    public function activeShipped($order_id) {
    	$order = Order::find($order_id);

    	$order->order_status = 'shipped';
    	$order->save();

    	alert()->success('ยืนยันการจัดส่งสินค้า รหัสการสั่งซื้อ : '.$order->order_number.' เรียบร้อยแล้ว', 'ยืนยันการจัดส่งสินค้าเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }

    public function sendToFarm($order_id) {
    	$farmer_order = new FarmerOrder;
    	$order = Order::find($order_id);

    	$order->send_to_farmer = 1;
    	$order->save();

    	$farmer_order->order_id = $order_id;
    	$farmer_order->order_number = $order->order_number;
    	$farmer_order->order_status = '';

    	$farmer_order->save();

    	alert()->success('ส่งรายการสินค้า รหัสการสั่งซื้อ : '.$order->order_number.' ให้ฟาร์มเรียบร้อยแล้ว', 'ส่งสินค้าให้ฟาร์มเรียบร้อยล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }

    public function activeShippedPre($order_id) {
        $order = PreOrder::find($order_id);

        $order->order_status = 'shipped';
        $order->save();

        alert()->success('ยืนยันการจัดส่งสินค้า รหัสการสั่งซื้อ : '.$order->order_number.' เรียบร้อยแล้ว', 'ยืนยันการจัดส่งสินค้าเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();
    }

    public function sendToFarmPre($order_id) {
        $farmer_order = new FarmerOrder;
        $order = PreOrder::find($order_id);

        $order->send_to_farmer = 1;
        $order->save();

        $farmer_order->order_id = $order_id;
        $farmer_order->order_number = $order->order_number;
        $farmer_order->order_status = '';

        $farmer_order->save();

        alert()->success('ส่งรายการสินค้า รหัสการสั่งซื้อ : '.$order->order_number.' ให้ฟาร์มเรียบร้อยแล้ว', 'ส่งสินค้าให้ฟาร์มเรียบร้อยล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();
    }
}
