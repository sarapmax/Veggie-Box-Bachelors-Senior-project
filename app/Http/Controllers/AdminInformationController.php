<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\AdminInformation ;

class AdminInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $informations = AdminInformation::all();

        return view('admin.admininformation.index' , compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $information = new AdminInformation;

        return view('admin.admininformation.create' , compact('information'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request , [
          'topic' => 'required|min:1' ,
          'text' => 'required|min:1 '
        ]);

        $information = new AdminInformation ;

        $information->topic = $request->input('topic');
        $information->text = $request->input('text');
        $information->admin_id = auth()->guard('admin')->user()->id ;
        $information->save();

        alert()->success('ข่าว '. $information->topic . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มข่าวสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');
        return redirect()->route('admin.admininformation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $information = AdminInformation::find($id);

        return view('admin.admininformation.edit' , compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $information = AdminInformation::find($id);
        $this->validate($request , [
          'topic' => 'required|max:255 ' ,
          'text' => 'required|min:1 '
        ]);

        $information->topic = $request->input('topic');
        $information->text = $request->input('text');
        $information->save();

        alert()->success('ข่าว '. $information->topic . ' ถูกแก้ไขแล้ว', 'แก้ไขข่าวรองสำเร็จ', 'สำเร็จ')->persistent('ปิด');

        return redirect()->route('admin.admininformation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $information = AdminInformation::find($id);

        $information->delete();

        alert()->success('ใบรับรอง '. $information->topic . ' ถูกลบออกจากระบบเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();
    }
}
