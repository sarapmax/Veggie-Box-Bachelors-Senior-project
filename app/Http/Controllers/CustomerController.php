<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use Hash;
use Cart;

class CustomerController extends Controller
{
    public function getLogin() {
    	if(auth()->guard('customer')->check()) {
    		return redirect('/');
    	}else {
    		return view('customer.login');
    	}
    }

    public function getRegister() {
    	if(auth()->guard('customer')->check()) {
    		return redirect('/');
    	}else {
    		return view('customer.register');
    	}
    }

    public function postRegister(Request $request) {

    	$this->validate($request, [
    		'email' => 'required|email|unique:customers', 
    		'password'  => 'required|Confirmed',
         	'password_confirmation'=> 'required',
    		'firstname' => 'required|min:4', 
    		'lastname' => 'required|min:4', 
    		'phone' => 'required|alphaNum',
    		'address' => 'required', 
    		'sub_district' => 'required', 
    		'district' => 'required', 
    		'province' => 'required', 
    		'zipcode' => 'required', 
    	]);

    	Customer::create([
            'email' => $request->input('email'), 
            'password' => Hash::make($request->input('password')), 
            'firstname' => $request->input('firstname'), 
            'lastname' => $request->input('lastname'), 
            'phone' => $request->input('phone'),
            'address' => $request->input('address'), 
            'sub_district' => $request->input('sub_district'), 
            'district' => $request->input('district'), 
            'province' => $request->input('province'), 
            'zipcode' => $request->input('zipcode'), 
            'activated' => 1, 
            'coins' => 10000,
            'latLng' => $request->input('latLng'),
        ]);

        return redirect('login')->with('alert-success', 'คุณได้ทำการสมัครสมาชิกเรียบร้อยแล้ว คุณสามารถเข้าสู่ระบบได้เลย');
    }

    public function postLogin(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$auth = auth()->guard('customer');

    	$credentials = [
    		'email' => $request->input('email'),
    		'password' => $request->input('password'),
    	];

    	if($auth->attempt($credentials)) {
    		if(count(Cart::content()) > 0) {
    			return redirect('cart');
    		}else {
    			return redirect('/');
    		}
    	}else {
    		return redirect()->back()->with('alert-danger', 'อีเมล หรือพาสเวิร์ดของคุณไม่ถูกต้อง');
    	}
    }

    public function getLogout() {
    	auth()->guard('customer')->logout();

    	return redirect()->back();
    }

    public function getAccount() {
        $member = Customer::find(auth()->guard('customer')->user()->id);

        return view('customer.profile', compact('member'));
    }
}
