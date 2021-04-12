<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Models\navbar;
use App\Models\icon;
use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::orderBy('id' , 'DESC')->get();
        return view('panel.blog',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::get();
        return view('panel.blog-create' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new blog();
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->text = $request->input('text');
        $blog->slug = $request->input('slug');
        $blog->keyword = $request->input('keyword');
        if($request->hasFile('name_pic')){
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('blog-picture', $filename);
            $blog->name_pic = $filename;
        }
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
            'title.max'=> 'عنوان شما نباید بیشتر از 60 حرف باشد.',
            'slug.required'=> 'فیلد خروجی سئو اجباری است.',
            'slug.unique'=> 'این خروجی سئو قبلا در پایگاه داده ثبت شده است؛ آن را تغییر دهید.',
            'name_pic.required'=> 'انتخاب تصویر شاخص اجباری است.',
            'name_pic.mimes'=> 'فقط فایل های jpg , png قابل استفاده در تصویر شاخص است.',
        ];
        $validated = $request->validate([
            'title' => 'required|max:60',
            'slug' => 'required|unique:blogs',
            'name_pic' => 'required|mimes:jpeg,jpg,png',
        ],$messages);
        if($blog->save()){
            $msg="نوشته شما با موفقیت ایجاد شد.";
            return redirect(Route('blog.index'))->with('success',$msg);
        }else{
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger',$msg);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $slug = '')
    {
       $navbar = navbar::get();
       $icon = icon::get();
       $setting = setting::get();
       $blog = blog::find($id);
        if ($slug !== $blog->slug) {
           return redirect()->to($blog->url);
        }
        return view('site.blog-view' , compact('blog','navbar','icon','setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::get();
        $blog = blog::find($id);
        return view('panel.blog-update' , compact('blog','category'));
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
        $blog = blog::find($id);
        $blog->title = $request->input('title');
        $blog->category = $request->input('category');
        $blog->text = $request->input('text');
        $blog->slug = $request->input('slug');
        $blog->keyword = $request->input('keyword');
        if($request->hasFile('name_pic')){
            Storage::delete('blog-picture/'.$blog->name_pic);
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('blog-picture', $filename);
            $blog->name_pic = $filename;
        }
        $messages=[
            'title.required'=> 'لطفا فیلد عنوان را پر کنید.',
            'title.max'=> 'عنوان شما نباید بیشتر از 60 حرف باشد.',
            'slug.required'=> 'فیلد خروجی سئو اجباری است.',
            'slug.unique'=> 'این خروجی قبلا در پایگاه داده ثبت شده است؛ آن را تغییر دهید.',
            'name_pic.required'=> 'انتخاب تصویر شاخص اجباری است.',
            'name_pic.mimes'=> 'فقط فایل های jpg , png قابل استفاده در تصویر شاخص است.',
        ];
        $validated = $request->validate([
            'title' => 'required|max:60',
            'slug' => 'required|unique:blogs',
            'name_pic' => 'required|mimes:jpeg,jpg,png',
        ],$messages);
        if($blog->save()){
            $msg="نوشته شما با موفقیت ویرایش شد.";
            return redirect(Route('blog.index'))->with('success',$msg);
        }else{
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger',$msg);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = blog::find($id);
        Storage::delete('blog-picture/'.$blog->name_pic);
        if($blog->delete()){
            $msg="صفحه بلاگ شما با موفقیت حذف شد.";
            return redirect(Route('blog.index'))->with('danger',$msg);
        }else{
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger',$msg);
        }
    }
}
