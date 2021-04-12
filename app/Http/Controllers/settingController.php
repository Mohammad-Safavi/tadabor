<?php

namespace App\Http\Controllers;

use App\Models\setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function index()
    {
        $setting = setting::get();
        return view('panel.setting',compact('setting'));
    }
    public function update(Request $request , $id)
    {
        $setting = setting::find($id);
        $setting->name = $request->input('name');
        $setting->keyword = $request->input('keyword');
        $setting->description = $request->input('description');
        $messages=[
            'name.required'=> 'لطفا فیلد نام را پر کنید.',
            'name.max'=> 'فیلد نام نمی تواند بیشتر از ۳۰ حرف باشد.',
            'description'=> 'لطفا فیلد توضیحات را پر کنید.',
        ];
        $validated = $request->validate([
            'name' => 'required|max:30',
            'description' => 'required',
        ],$messages);
        if($setting->save()){
            $msg = "ویرایش با موفقیت انجام شد.";
        }else{
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('setting.index'))->with('success',$msg);
    }
}
