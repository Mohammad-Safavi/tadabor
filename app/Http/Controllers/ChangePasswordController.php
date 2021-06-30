<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Redirect;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('panel.changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $messages=[
            'current_password.required'=> 'فیلد رمز عبور فعلی الزامی است.',
            'new_password.required'=> 'فیلد رمز عبور جدید الزامی است.',
            'new_password.min'=> 'رمز عبور شما باید بیشتر از ۸ کاراکتر باشد.',
                   ];
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'new_confirm_password' => ['same:new_password'],
        ] ,$messages);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $msg = "عملیات تغییر رمز با موفقیت انجام شد.";
        return back()->with('success', $msg);
    }
    public function edit($id)
    {
        if(User::find($id)){
            $user = User::find($id);
            if($user->type == null){
                return view('panel.changePassword-manage', compact('user'));
            }else{
                return Redirect::Back();
            }
        }else{
            abort(404);
        }
    }
    public function store_manage(Request $request , $id)
    {
            $messages = [
                'new_password.required' => 'فیلد رمز عبور جدید الزامی است.',
                'new_password.min' => 'رمز عبور شما باید بیشتر از ۸ کاراکتر باشد.',
            ];
            $request->validate([
                'new_password' => ['required', 'min:8'],
                'new_confirm_password' => ['same:new_password'],
            ], $messages);

            User::find($id)->update(['password' => Hash::make($request->new_password)]);
            $msg = "عملیات تغییر رمز با موفقیت انجام شد.";
            return redirect::Back()->with('success', $msg);

    }
}
