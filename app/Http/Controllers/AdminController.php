<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Admin;
use Hash;

class AdminController extends Controller
{
	public function index() {
		$admins = Admin::orderBy('created_at', 'DESC')->get();

		return view('admin.admin.index', compact('admins'));
	}

    public function getLogin() {
    	return view('admin.login');
    }

    public function create() {
    	return view('admin.admin.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email|unique:admins', 
    		'password'  => 'required|Confirmed',
         	'password_confirmation'=> 'required',
    		'fullname' => 'required|min:5', 
    	]);

    	Admin::create([
    		'email' => $request->input('email'), 
    		'password' => Hash::make($request->input('password')), 
    		'fullname' => $request->input('fullname'), 
    	]);

    	alert()->success('เพิ่มแอดมินเข้าสู่ระบบเรียบร้อยแล้ว', 'เพิ่มแอดมินเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect('admin/admin');
    }


    public function postLogin(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
		]);

		$auth = auth()->guard('admin');

		$credentials = [
		   'email' =>  $request->input('email'),
		   'password' =>  $request->input('password'),
		];

		if ($auth->attempt($credentials)) {
			return redirect('admin');
		}else {
			return redirect()->back()->with('error-login', 'อีเมล หรือ รหัสผ่านไม่ถูกต้อง');
		}
	}

	public function getLogout() {
		auth()->guard('admin')->logout();

		return redirect('admin/login');		
	}
}
