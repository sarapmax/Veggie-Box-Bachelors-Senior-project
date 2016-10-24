<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\FarmerCertification ;

class FarmerCertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certifications = FarmerCertification::all();

        return view('farmer.certification.index' , compact('certifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('farmer.certification.create');
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
          'name' => 'min:3|required|unique:farmer_certifications',
          'certification_file' => 'required|unique:farmer_certifications'
        ]);


        $certification = new FarmerCertification ;

        if($request->hasFile('certification_file')){
          $file = $request ->file('certification_file');

          $file_name = 'certification_file_'.time().'.'.$file->getClientOriginalExtension();
          $file->move('certification_file/' , $file_name);

          $certification->certification_file = $file_name ;
        }

        $certification->name = $request->input('name');
        $certification->farmer_id = auth()->guard('farmer')->user()->id ;

        $certification->save();

        alert()->success('ใบรับรอง '. $certification->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มใบรับรองสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->route('farmer.certification.index');
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
        $certification = FarmerCertification::find($id);

        return view('farmer.certification.edit' , compact('certification'));

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
        $certification = FarmerCertification::find($id) ;
        $this->validate($request , [
          'name' => 'min:3|required',
          'certification_file' => 'required'
        ]);

        if($request->hasFile('certification_file')){
          $file = $request ->file('certification_file');

          $file_name = 'certification_file_'.time().'.'.$file->getClientOriginalExtension();
          $file->move('certification_file/' , $file_name);

          $certification->certification_file = $file_name ;
        }

        $certification->name = $request->input('name');
        $certification->farmer_id = auth()->guard('farmer')->user()->id ;
        $certification->save();

        alert()->success('ใบรับรอง '. $certification->name . ' ถูกแก้ไขแล้ว', 'แก้ไขใบรับรองสำเร็จ', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->route('farmer.certification.index');

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
        $certification = FarmerCertification::find($id);
        $certification->delete();

        alert()->success('ใบรับรอง '. $certification->name . ' ถูกลบออกจากระบบเรียบร้อยแล้ว', 'สำเร็จ')->persistent('ปิด');;

        return redirect()->back();
    }
}
