<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feed ;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $feeds = Feed::all();

        return view('admin.feed.index' , compact('feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.feed.create');
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
          'topic' => 'required|unique:feeds',
          'detail' => 'required|unique:feeds'
        ]);

        $feed = new Feed ;
        $feed->topic = $request->input('topic');
        $feed->detail = $request->input('detail');
        $feed->slug = slug($request->input('topic'));
        $feed->admin_id = auth()->guard('admin')->user()->id ;

        $feed->save();

        alert()->success('ข่าว '. $feed->topic . ' ถูกเพิ่มเข้าสู่ระบบแล้ว', 'เพิ่มข่าวสำเร็จแล้ว', 'สำเร็จ')->persistent('ปิด');
        return redirect()->route('admin.feed.index');
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
        $feed = Feed::find($id);
        return view('admin.feed.edit' , compact('feed'));
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
        $feed = Feed::find($id);
        $this->validate($request , [
          'topic' => 'required',
          'detail' => 'required'
        ]);

        $feed = new Feed ;
        $feed->topic = $request->input('topic');
        $feed->detail = $request->input('detail');
        $feed->activated = $request->input(1);
        $feed->slug = slug($request->input('topic'));
        $feed->admin_id = auth()->guard('admin')->user()->id ;

        $feed->save();

        alert()->success('ข่าว '. $feed->topic . ' ถูกแก้ไขแล้ว', 'แก้ไขข่าวสำเร็จ', 'สำเร็จ')->persistent('ปิด');
        return redirect()->route('admin.feed.index');
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
        $feed = Feed::find($id);
        $feed->delete();

        alert()->success('ข่าว '. $feed->topic . ' ถูกลบออกจากระบบแล้ว', 'ลบข่าวสำเร็จ', 'สำเร็จ')->persistent('ปิด');
        return redirect()->back();
    }
}
