<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CustomerInbox;

class CustomerInboxController extends Controller
{
    public function index() {
        $inboxes = CustomerInbox::whereCustomerId(auth()->guard('customer')->user()->id)->orderBy('created_at', 'DESC')->paginate(20);

        return view('customer.inbox', compact('inboxes'));
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
        $customer_inbox->read = 1;

    	$customer_inbox->save();

    	return redirect('member/inbox')->with('alert-success', 'ส่งข้อความให้แอดมินเรียบร้อยแล้ว');
    }

    public function getInBoxDetail($slug) {
        $inbox = CustomerInbox::whereSlug($slug)->first();

        $inbox->read = 1;
        $inbox->save();

        return view('customer.inbox_detail', compact('inbox'));
    }
}
