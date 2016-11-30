<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerCoinController extends Controller
{
    public function getVeggiecion() {
    	return view('customer.coin');
    }
}
