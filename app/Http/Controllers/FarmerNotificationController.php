<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FarmerNotification;

class FarmerNotificationController extends Controller
{
    public function index() {
    	$notifications = FarmerNotification::where('farmer_id', auth()->guard('farmer')->user()->id)->orderBy('created_at', 'DESC')->paginate(15);

    	return view('farmer.notification.index', compact('notifications'));
    }
}
