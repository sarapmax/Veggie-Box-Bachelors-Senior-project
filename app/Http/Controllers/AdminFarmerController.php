<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmer;

class AdminFarmerController extends Controller
{
    public function index() {
    	$farmers = Farmer::orderBy('created_at', 'DESc')->get();

    	return view('admin.farmer.index', compact('farmers'));
    }

    public function farmerActivate(Request $request) {
    	$farmer = Farmer::find($request->input('farmer_id'));

    	$farmer->activated = 1;
    	$farmer->save();

    	alert()->success('เปิดใช้งาน Farmer : '.$farmer->email.' เรียบร้อยแล้ว', 'เปิดใช้งาน Farmer เรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }

    public function farmerDeactivate(Request $request) {
    	$farmer = Farmer::find($request->input('farmer_id'));

    	$farmer->activated = 0;
    	$farmer->save();

    	alert()->success('ปิดใช้งาน Farmer : '.$farmer->email.' เรียบร้อยแล้ว', 'ปิดใช้งาน Farmer เรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect()->back();
    }

    public function show(Request $request) {
    	$farmer = Farmer::find($request->input('farmer_id'));

    	return view('admin.farmer.show', compact('farmer'));
    }
}
