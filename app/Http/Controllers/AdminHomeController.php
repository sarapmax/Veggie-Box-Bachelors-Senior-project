<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminHomeController extends Controller
{
	public function index() {
		return view('admin.home.index');
	}
}
