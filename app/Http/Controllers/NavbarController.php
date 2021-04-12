<?php

namespace App\Http\Controllers;
use App\Models\navbar;
use App\Models\page;
use App\Models\icon;
use App\Models\blog;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbar = navbar::get();
        $icon = icon::get();
        return view('panel.navbar', compact('navbar','icon'));
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
    public function store(Request $request )
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $navbar = navbar::find($id);
        $blog = blog::get();
        $page = page::get();
        return view('panel.navbar-update',compact('navbar','page','blog'));
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
         $navbar = navbar::find($id);
         $navbar->title = $request->input('title');
         $navbar->url = $request->input('url');
         $navbar->open_page = $request->input('open_page');
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
            'title.max'=> 'عنوان شما نباید بیشتر از ۲۰ حرف باشد.',
        ];
        $validated = $request->validate([
            'title' => 'required|max:20',
        ],$messages);
         if($navbar->save()){
             $msg = "ویرایش با موفقیت انجام شد.";
         }else{
             $msg = "عملیات ویرایش با خطا روبه رو شد.";
         }
         return redirect(Route('navbar.index'))->with('success',$msg);


    }
    public function update_icon(Request $request,$id)
    {
        $icon = icon::find($id);
        $icon->url = $request->input('url');
        if($icon->save()){
            $msg = "ویرایش با موفقیت انجام شد.";
        }else{
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('navbar.index'))->with('success',$msg);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\navbar  $navbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(navbar $navbar)
    {
        //
    }
}
