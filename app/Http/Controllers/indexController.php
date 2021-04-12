<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\DB;
use App\Models\navbar;
use App\Models\blog;
use App\Models\icon;
use App\Models\User;
use App\Models\item;
use App\Models\setting;
use Auth;
class indexController extends Controller
{
    public function index(){
        $navbar = navbar::get();
        $item = item::get();
        $icon = icon::get();
        $setting = setting::get();
        return view('site.index',compact('navbar','item','icon','setting'));
    }
    public function index_panel(){
        return view('panel.index');
    }
    public function manage(){
        $user = Auth::User();
        if (($user->type)=="super_admin"){
            $users = User::get();
            return view('panel.manage', ["users"=>$users]);
        }else{
            return redirect(Route('panel'));
        }

    }
    public function deletemanage($id)
    {
        $user = Auth::User();
        if (($user->type) == "super_admin") {
            $users = User::find($id);
            $users->delete();
            return redirect(Route('manage'));
        } else {
            return redirect(Route('panel'));
        }
    }
    public function filter(Request $request){
        $navbar = navbar::get();
        $icon = icon::get();
        $category = category::get();
        $setting = setting::get();
        $category_blog =  $request->input('category');
        if($category_blog!=""){
            $blog = blog::where(function ($query) use ($category_blog){
                $query->where('category', 'LIKE', '%' . $category_blog . '%');
            })
                ->paginate(6);
            $blog->appends(['category' => $category_blog]);
        }
        else{
            $blog = blog::paginate(6);
        }
        return view('site.blog',compact('blog','category','navbar','icon','setting'));
    }
    public function search(Request $request){
        $navbar = navbar::get();
        $icon = icon::get();
        $category = category::get();
        $setting = setting::get();
        $search =  $request->input('q');
        if($search!=""){
            $blog = blog::where(function ($query) use ($search){
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('text', 'LIKE', '%' .$search . '%');
            })
                ->paginate(6);
            $blog->appends(['q' => $search]);
        }
        else{
            $blog = blog::paginate(6);
        }
        return view('site.blog',compact('blog','category','navbar','icon','setting' ));
    }

    public function blog(){
            $navbar = navbar::get();
            $icon = icon::get();
            $category = category::get();
            $setting = setting::get();
            $blog= blog::orderBy('id' , 'DESC')->paginate(6);
            return view('site.blog',compact('blog','category','navbar','icon','setting' ));
        }




}
