<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feed;

class CustomerFeedController extends Controller
{
    public function index() {
    	$feeds = Feed::orderBy('created_at', 'DESC')->get();

    	return view('customer.feed', compact('feeds'));
    }

    public function getFeedDetail($slug) {
    	$feed = Feed::whereSlug($slug)->first();

    	return view('customer.feed_detail', compact('feed'));
    }
}
