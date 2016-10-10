<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class HomeController extends Controller
{
    public function uploadImage(Request $request) {
    	$allowed = array('png', 'jpg', 'gif');
	    $rules = [
	        'file' => 'required|image|mimes:jpeg,jpg,png,gif'
	    ];
	    $data = $request->all();
	    $validator = Validator::make($data, $rules);
	    if ($validator->fails()) {
	        return '{"status":"Invalid File type"}';
	    }
	    if($request->hasFile('file')){
	        $extension = $request->file('file')->getClientOriginalExtension();
	        if(!in_array(strtolower($extension), $allowed)){
	            return '{"status":"Invalid File type"}';
	        } else {
	            $filename = uniqid() . '_attachment.' . $extension;
	            if ($request->file('file')->move('texteditor-source/', $filename)) {
	                echo url('texteditor-source/' . $filename);
	                exit;
	            }
	        }
	    } else {
	        return '{"status":"Invalid File type"}';
	    }
    }
}
