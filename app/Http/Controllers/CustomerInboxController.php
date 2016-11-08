<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CustomerInbox;

class CustomerInboxController extends Controller
{
    public function index() {
        return view('customer.inbox');
    }

    public function getSendInbox() {
    	return view('customer.inbox_send');
    }

    public function postSendInbox(Request $request) {
    	$this->validate($request, [
    		'status' => 'required',
    		'topic' => 'required',
    		'message' => 'required',
    	]);

    	$customer_inbox = new CustomerInbox;

    	$customer_inbox->topic = $request->input('topic');
    	$customer_inbox->status = $request->input('status');
    	$customer_inbox->message = $request->input('message');
    	$customer_inbox->customer_id = auth()->guard('customer')->user()->id;
    	$customer_inbox->slug = slug($request->input('topic'));

    	$customer_inbox->save();

    	return redirect('member/inbox')->with('alert-success', 'ส่งข้อความให้แอดมินเรียบร้อยแล้ว');
    }
}
