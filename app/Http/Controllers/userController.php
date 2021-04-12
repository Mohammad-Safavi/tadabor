<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function profile(){
        return view('panel.user');
    }
    protected function edit_profile(request $request , $id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        if($user->save()){
            $msg = "ویراش کاربری با موفقیت انجام شد.";
            return redirect(Route('user.index'))->with('success' , $msg);
        }else{
                $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
                return redirect(Route('user.index'))->with('danger',$msg);

        }
    }
}
