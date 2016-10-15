<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmer;
use Image;
use Auth;
use Hash;

class FarmerController extends Controller
{
    public function getLogin() {
    	return view('farmer.login');
    }

    public function getRegister() {
    	return view('farmer.register');
    }

    public function postRegister(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email|unique:farmers', 
    		'password'  => 'required|Confirmed',
         	'password_confirmation'=> 'required',
    		'firstname' => 'required|min:4', 
    		'lastname' => 'required|min:4', 
    		'farm_name' => 'required|min:4', 
    		'phone' => 'required|alphaNum',
    		'address' => 'required', 
    		'sub_district' => 'required', 
    		'district' => 'required', 
    		'province' => 'required', 
    		'zipcode' => 'required', 
    	]);

        $input['farm_img'] = null;
        $input['vat_registration'] = null;

    	// farm image
        if($request->hasFile('farm_img')) {
                $thumb = $request->file('farm_img');

                $input['farm_img'] = 'farm_img_'.time().'.'.$thumb->getClientOriginalExtension();
                $destinationPath = 'farmer_file/farmer_img';

                $thumb_image = Image::make($thumb->getRealPath());

                $thumb_image->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();

                })->save($destinationPath.'/'.$input['farm_img']);
        }

        // vat registration
        if($request->hasFile('vat_registration')) {
                $thumb = $request->file('vat_registration');

                $input['vat_registration'] = 'farmer_vat_registration_'.time().'.'.$thumb->getClientOriginalExtension();
                
                $destinationPath = 'farmer_file/farmer_vat_registration/';

                $thumb->move($destinationPath, $input['vat_registration']);

                
        }

        Farmer::create([
            'email' => $request->input('email'), 
            'password' => Hash::make($request->input('password')), 
            'firstname' => $request->input('firstname'), 
            'lastname' => $request->input('lastname'), 
            'farm_name' => $request->input('farm_name'), 
            'farm_desc' => $request->input('farm_desc'), 
            'farm_img' => $input['farm_img'],
            'phone' => $request->input('phone'),
            'address' => $request->input('address'), 
            'sub_district' => $request->input('sub_district'), 
            'district' => $request->input('district'), 
            'province' => $request->input('province'), 
            'zipcode' => $request->input('zipcode'), 
            'activated' => 0, 
            'vat_registration' => $input['vat_registration'],
        ]);

    	alert()->success('คุณต้องรอการยืนยันจากแอดมินจึงจะสามารถเข้าสู่ระบบได้', 'สมัครสมาชิกเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect('farmer/login');
    }

    public function postLogin(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		$auth = auth()->guard('farmer');

		$credentials = [
		   'email' =>  $request->input('email'),
		   'password' =>  $request->input('password'),
		];

		if ($auth->attempt($credentials)) {
			return redirect('farmer');
		}else {
			return redirect()->back()->with('error-login', 'อีเมล หรือ รหัสผ่านไม่ถูกต้อง');
		}
	}


    public function getLogout() {
        auth()->guard('farmer')->logout();

        return redirect('farmer/login');
    }

}
