<?php

namespace App\Http\Controllers;

use App\Models\navbar;
use App\Models\page;
use App\Models\icon;
use App\Models\setting;
use Illuminate\Http\Request;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = page::orderBy('id', 'desc')->get();
        return view('panel.page',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.page-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $page = new page();
        $page->title = $request->input('title');
        $page->form = $request->input('form');
        $page->text = $request->input('text');
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
        ];
        $validated = $request->validate([
            'title' => 'required',
        ],$messages);
        if($page->save()){
            $msg = "صفحه جدید با موفقیت ایجاد شد.";
        }else{
            $msg = "عملیات ثبت با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('success',$msg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = page::find($id);
        $navbar = navbar::get();
        $icon = icon::get();
        $setting = setting::get();
        if(page::where('id', $id)->first()){
        return view('site.page-view', compact('page','navbar','icon','setting'));

        }else {
        abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = page::find($id);
        return view('panel.page-update',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $page = page::find($id);
        $page->title = $request->input('title');
        $page->form = $request->input('form');
        $page->text = $request->input('text');
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
        ];
        $validated = $request->validate([
            'title' => 'required',
        ],$messages);
        if($page->save()){
            $msg = "ویرایش با موفقیت انجام شد.";
        }else{
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('success',$msg);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = page::find($id);
        if($page->delete()){
            $msg = "حذف با موفقیت انجام شد.";
        }else{
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('danger',$msg);


    }
}
