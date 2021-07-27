<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\navbar;
use App\Models\setting;
use Auth;
trait ConfirmsPasswords
{
    use RedirectsUsers;

    /**
     * Display the password confirmation view.
     *
     * @return \Illuminate\View\View
     */
    public function showConfirmForm()
    {
        if(!Auth::check()){
            $data['navbar'] = navbar::all();
            $data['icon'] = setting::where('description' , '1')->select('url')->get();
            $data['pfo'] = setting::where('url' , '1')->select('name' , 'description')->get();     
            $data['setting'] = setting::where('id' , 1)->get();
            SEOMeta::setTitle('بازیابی رمز عبور');
            return view('auth.passwords.confirm' , $data);
        }else{
            abort(404);
        }
        
    }

    /**
     * Confirm the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function confirm(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());

        $this->resetPasswordConfirmationTimeout($request);

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * Reset the password confirmation timeout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function resetPasswordConfirmationTimeout(Request $request)
    {
        $request->session()->put('auth.password_confirmed_at', time());
    }

    /**
     * Get the password confirmation validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'password' => 'required|password',
        ];
    }

    /**
     * Get the password confirmation validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }
}
