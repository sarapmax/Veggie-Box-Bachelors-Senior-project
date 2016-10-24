<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CoinPackage;

class CoinPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coins = CoinPackage::all();

        return view('admin.coinpackage.index' , compact('coins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coinpackage.create');
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
          'name' => 'required|min:4|unique:CoinPackage' ,
          'coin_amount' => 'required|min:4|unique:CoinPackage',
          'price' => 'required|min:4|unique:CoinPackage',
          'slug' => 'required',

        ]);

        $coin = new CoinPackage ;

        $coin->name = $request->input('name');
        $coin->coin_amount = $request->input('coin_amount');
        $coin->price = $request->input('price');

        $coin->save();
        alert()->success('แพคเกจเหรียญ '. $coin->name . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มแพคเกจเหรียญสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->route('admin.coinpackage.index');
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
        $coin = CoinPackage::find($id);

        return view('admin.coinpackage.edit' , compact('coin'));
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
        $this->validate($request , [
          'name' => 'required|min:4|unique:CoinPackage' ,
          'coin_amount' => 'required|min:4|unique:CoinPackage',
          'price' => 'required|min:4|unique:CoinPackage',
          'slug' => 'required',

        ]);

        $coin =  CoinPackage::find($id) ;

        $coin->name = $request->input('name');
        $coin->coin_amount = $request->input('coin_amount');
        $coin->price = $request->input('price');

        $coin->save();

        alert()->success('แพคเกจเหรียญ '. $coin->name . ' ถูกแก้ไขแล้ว', 'แก้ไขแพคเกจเหรียญสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');
        return redirect()->route('admin.coinpackage.index');
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
        $coin = CoinPackage::find($id) ;
        $coin->delete();

        alert()->success('แพคเกจเหรียญ '. $coin->name . ' ถูกลบแล้ว', 'ลบแพคเกจเหรียญสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');

        return redirect()->back();
    }
}
