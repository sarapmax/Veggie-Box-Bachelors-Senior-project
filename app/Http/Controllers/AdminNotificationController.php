<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AdminNotification;

class AdminNotificationController extends Controller
{
    public function index() {
    	$notifications = AdminNotification::orderBy('created_at', 'DESC')->paginate(15);

    	return view('admin.notification.index', compact('notifications'));
    }
}
