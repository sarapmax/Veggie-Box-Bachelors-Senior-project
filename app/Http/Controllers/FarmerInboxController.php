<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\FarmerInbox;

class FarmerInboxController extends Controller
{
    public function index() {
    	$inboxes = FarmerInbox::whereFarmerId(auth()->guard('farmer')->user()->id)->orderBy('created_at', 'DESC')->paginate(20);

    	return view('farmer.inbox.index', compact('inboxes'));
    }

    public function getInboxDetail($slug) {
    	$inbox = FarmerInbox::whereSlug($slug)->whereFarmerId(auth()->guard('farmer')->user()->id)->first();

    	return view('farmer.inbox.detail', compact('inbox'));
    }

    public function getSendInbox() {
    	return view('farmer.inbox.send');
    }

    public function postSendInbox(Request $request) {
    	$this->validate($request, [
            'status' => 'required',
            'topic' => 'required',
            'message' => 'required',
        ]);

        $farmer_inbox = new FarmerInbox;
        
        $farmer_inbox->topic = $request->input('topic');
        $farmer_inbox->status = $request->input('status');
        $farmer_inbox->message = $request->input('message');
        $farmer_inbox->farmer_id = auth()->guard('farmer')->user()->id;
        $farmer_inbox->slug = slug($request->input('topic'));

        $farmer_inbox->save();

        alert()->success('ส่งข้อความให้แอดมินเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect('farmer/inbox');
    }
}
