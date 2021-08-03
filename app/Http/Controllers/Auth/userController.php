<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class userController extends Controller
{
    public function profile()
    {
        return view('panel.user');
    }

    protected function edit_profile(request $request)
    {
        $id = Auth::User()->id;
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($user->save()) {
            $msg = "ویراش کاربری با موفقیت انجام شد.";
            return back()->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return back()->with('danger', $msg);
        }
    }

    protected function manage_user()
    {
        $users = User::where('type', Null)->get();
        return view('panel.manage-user', ["users" => $users]);
    }

    protected function manage_update(Request $request, $id)
    {
        $user = User::find($id);
        $user->type = $request->input('type');
        if ($user->save()) {
            $msg = "نقش کاربر  مورد نظر با موفقیت تغییر کرد.";
            $st = "success";
        } else {
            $msg = "خطایی در سیستم رخ داده است.";
            $st = "danger";
        }
        return back()->with($st, $msg);
    }

    protected function manage_manager()
    {
        $user = Auth::User();
        if (($user->type) == "gsh229sdiujcl1@kdj#is920") {
            $users = User::where('type', 'jcd203@03id_30wlsflasl')->get();
            return view('panel.manage-manager', ["users" => $users]);
        } else {
            return redirect(Route('panel'));
        }
    }

    protected function delete_manage($id)
    {
        $user = Auth::User();
        $users = User::find($id);
        if ($users->type == null || $users->type == 'jcd203@03id_30wlsflasl') {
            if ($users->delete()) {
                $msg = "کاربر مورد نظر با موفقیت حذف شد.";
                $st = "success";
            } else {
                $msg = "اختلالی در سیستم رخ داده است.";
                $st = "danger";
            }
            return back()->with($st, $msg);
        } else {
            return back();
        }
        
    }
}
