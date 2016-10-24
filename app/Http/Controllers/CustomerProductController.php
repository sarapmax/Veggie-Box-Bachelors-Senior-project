<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class CustomerProductController extends Controller
{
    public function getProductsPage() {
    	$products = Product::orderBy('created_at', 'DESC')->paginate(16);

    	return view('customer.products', compact('products'));
    }
}
