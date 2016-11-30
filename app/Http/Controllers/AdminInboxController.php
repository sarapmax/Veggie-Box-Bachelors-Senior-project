<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CustomerInbox;
use App\FarmerInbox;
use App\Farmer;

class AdminInboxController extends Controller
{
    public function getCustomerInbox() {
    	$inboxes = CustomerInbox::orderBy('created_at', 'DESC')->paginate(20);

    	return view('admin.customer_inbox.index', compact('inboxes'));
    }

    public function getCustomerInboxDetail($slug) {
    	$inbox = CustomerInbox::whereSlug($slug)->first();

    	return view('admin.customer_inbox.detail', compact('inbox'));
    }

    public function getCustomerInboxSend() {
    	return view('admin.customer_inbox.send');
    }

   public function postCustomerInboxSend(Request $request) {
   		$this->validate($request, [
   			'customer_id' => 'required',
    		'status' => 'required',
    		'topic' => 'required',
    		'message' => 'required',
    	]);

    	$customer_inbox = new CustomerInbox;

    	$customer_inbox->topic = $request->input('topic');
    	$customer_inbox->status = $request->input('status');
    	$customer_inbox->message = $request->input('message');
    	$customer_inbox->customer_id = $request->input('customer_id');
    	$customer_inbox->slug = slug($request->input('topic'));
        $customer_inbox->admin = 1;

    	$customer_inbox->save();

    	alert()->success('ส่งข้อความให้ '. $customer_inbox->customer->firstname. ' '. $customer_inbox->customer->lastname. ' เรียบร้อยแล้ว', 'ส่งข้อความให้ลูกค้าเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

    	return redirect('admin/inbox/customer');
   }

   public function getFarmerInbox() {
        $inboxes = FarmerInbox::orderBy('created_at', 'DESC')->paginate(20);

        return view('admin.farmer_inbox.index', compact('inboxes'));
    }

    public function getFarmerInboxDetail($slug) {
        $inbox = FarmerInbox::whereSlug($slug)->first();

        return view('admin.farmer_inbox.detail', compact('inbox'));
    }

    public function getFarmerInboxSend() {
        return view('admin.Farmer_inbox.send');
    }

   public function postFarmerInboxSend(Request $request) {
        $this->validate($request, [
            'farmer_id' => 'required',
            'status' => 'required',
            'topic' => 'required',
            'message' => 'required',
        ]);

        if($request->input('farmer_id') == 'all') {
            $farmers = Farmer::all();

            foreach($farmers as $farmer) {
                $farmer_inbox = new FarmerInbox;

                $farmer_inbox->topic = $request->input('topic');
                $farmer_inbox->status = $request->input('status');
                $farmer_inbox->message = $request->input('message');
                $farmer_inbox->farmer_id = $farmer->id;
                $farmer_inbox->slug = slug($request->input('topic'));
                $farmer_inbox->admin_information_id = $request->input('admin_information_id');

                $farmer_inbox->save();
            }
        }else {
            $farmer_inbox = new FarmerInbox;
            
            $farmer_inbox->topic = $request->input('topic');
            $farmer_inbox->status = $request->input('status');
            $farmer_inbox->message = $request->input('message');
            $farmer_inbox->farmer_id = $request->input('farmer_id');
            $farmer_inbox->slug = slug($request->input('topic'));
            $farmer_inbox->admin_information_id = $request->input('admin_information_id');

            $farmer_inbox->save();
        }

        // alert()->success('ส่งข้อความให้ฟาร์มเมอร์เรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        // return redirect('admin/inbox/farmer');
   }
}
