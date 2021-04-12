<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\blog;
use App\Models\navbar;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::get();
        return view('panel.category',compact('category'));
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
        $category = new category();
        $category->title = $request->input('title');
        if($category->save()) {
            $msg = "عملیات ایجاد با موفقیت انجام شد.";
            return redirect(Route('category.index'))->with('success', $msg);
        }else{
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('category.index'))->with('danger', $msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
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
        $category = category::find($id);
        if($category->delete()) {
            $msg = "عملیات حذف با موفقیت انجام شد.";
            return redirect(Route('category.index'))->with('danger', $msg);
        }else{
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('category.index'))->with('danger', $msg);
        }

    }
}
