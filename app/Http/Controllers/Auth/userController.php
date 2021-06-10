<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
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
    protected function manage_user(){
            $users = User::where('type' , Null)->get();
            return view('panel.manage-user', ["users"=>$users]);

    }
    protected function manage_update($id){
        if()

    }
    protected function manage(){
        $user = Auth::User();
        if (($user->type)=="gsh229sdiujcl1@kdj#is920"){
            $users = User::where('type' , 'gsh229sdiujcl1@kdj#is920')->get();
            return view('panel.manage', ["users"=>$users]);
        }else{
            return redirect(Route('panel'));
        }

    }
    protected function delete_manage($id)
    {
        $user = Auth::User();
            $users = User::find($id);
            $users->delete();
            return redirect(Route('manage'));

    }
}
