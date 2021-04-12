<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\item;
use App\Models\navbar;
use App\Models\page;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = item::get();
        return view('panel.item',compact('item',));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = item::find($id);
        $page = page::get();
        $blog = blog::get();
        return view('panel.items-update',compact('item','page','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = item::find($id);
        $item->title = $request->input('title');
        $item->url = $request->input('url');
        $item->open_page = $request->input('open_page');
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
            'title.max'=> 'عنوان شما نباید بیشتر از ۲۵ حرف باشد.',
        ];
        $validated = $request->validate([
            'title' => 'required|max:25',
        ],$messages);
        if($item->save()){
            $msg = "ویرایش با موفقیت انجام شد.";
        }else{
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('item.index'))->with('success',$msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        //
    }
}
