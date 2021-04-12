<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $message = message::orderBy('id' , 'desc')->get();
        return view('panel.message', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new message();
        $message->name = $request->input('name');
        $message->navbar_name = $request->input('navbar_name');
        $message->last_name = $request->input('last_name');
        $message->phone = $request->input('phone');
        $message->text = $request->input('text');
        $messages_1=[
            'name.required'=> 'لطفا فیلد نام را پر کنید.',
            'last_name.required'=> 'لطفا فیلد نام خانوادگی را پر کنید.',
            'phone.required'=> 'لطفا فیلد شماره تلفن را پر کنید.',
        ];
        $validated = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
        ],$messages_1);
        if($message->save()){
            $msg = "پیام شما با موفقیت ارسال شد.";
        }else{
            $msg = "عملیات ارسال با خطا مواجه شد.";
        }
        return back()->with('success',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = message::find($id);
        return view('panel.message-view',compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = message::find($id);
        if( $message->delete()){
            $msg = "حذف با موفقیت انجام شد.";
        }else{
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('message.index'))->with('danger',$msg);

    }
    public function destroyall(){
        message::truncate();
        if(message::truncate()){
            $msg = "حذف با موفقیت انجام شد.";
        }else{
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('message.index'))->with('danger',$msg);

    }
}
