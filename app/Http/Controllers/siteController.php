<?php

namespace App\Http\Controllers;
use App\Models\conn;
use App\Models\course;
use Artesaos\SEOTools\Facades\SEOMeta;
use App\Models\blog;
use App\Models\category;
use App\Models\comment;
use App\Models\icon;
use App\Models\item;
use App\Models\message;
use App\Models\navbar;
use App\Models\page;
use App\Models\file;
use App\Models\setting;
use Illuminate\Http\Request;
use Auth;

class siteController extends Controller
{
    //start site actions
    public function index_site()
    {
        $data['navbar'] = navbar::all();
        $data['item'] = item::all();
        $data['icon'] = icon::all();
        $data['setting'] = setting::all();
        SEOMeta::setTitle('خانه');
        $data['keyword'] = "";
        $data['description'] = "";
        return view('site.index', $data);
    }
    protected function index_dashboard(){
        $data['navbar'] = navbar::all();
        $data['item'] = item::all();
        $data['icon'] = icon::all();
        $data['setting'] = setting::all();
        SEOMeta::setTitle('داشبورد');
        $data['keyword'] = "";
        $data['description'] = "";
        return view('site.dashboard', $data);

    }
    //end site actions
    //start page actions
    /**
     * @param int $id
     */
    public function show_page($id)
    {
        if(page::find($id)) {
            $data['page'] = page::find($id);
            $data['navbar'] = navbar::all();
            $data['icon'] = icon::all();
            $data['setting'] = setting::all();
            SEOMeta::setTitle($data['page']->title);
            $data['keyword'] = $data['page']->title;
            $data['description'] = $data['page']->title;
            if (page::where('id', $id)->first()) {
                return view('site.page-view', $data);

            } else {
                abort(404);
            }
        }else{
            abort(404);
        }

    }
    //end page actions
    //start message actions
    public function store_message(Request $request)
    {
        $request->validate(message::$createRules , message::$message);
        if (message::create($request->all())) {
            $msg = "پیام شما با موفقیت ارسال شد.";
        } else {
            $msg = "عملیات ارسال با خطا مواجه شد.";
        }
        return back()->with('success', $msg);
    }
    //end message actions
    //start message actions
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
    public function store_comment(Request $request)
    {
       $request->validate(comment::$createRules , comment::$message);
        comment::create($request->all());
        return response()->json([
            'success' => true,
            'message' => "دیدگاه شما با موفقیت ثبت شد",
        ]);
    }
    //end message actions
    //start blog actions
    public function index_blog(Request $request , $slug = null)
    {
        $data['navbar'] = navbar::all();
        $data['icon'] = icon::all();
        $data['category'] = category::where('of' , 'blog')->orderBy('id' , 'DESC')->get();
        $data['setting'] = setting::all();
        SEOMeta::setTitle('وبلاگ');
        $data['keyword'] = "وبلاگ";
        $data['description'] = "وبلاگ";
        if (\request()->has('q')) {
            $search = $request->input('q');
            if ($search != "" ) {
                $data['blog'] = blog::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('text', 'LIKE', '%' . $search . '%');
                })
                    ->paginate(21);
                $data['blog']->appends(['q' => $search]);
            } else {
                $data['blog'] = blog::orderBy('id', 'DESC')->paginate(21);
            }
        } elseif (\request()->has('category')) {
            $category_blog = $request->input('category');
            if ($category_blog != "") {
                $data['blog'] = blog::where(function ($query) use ($category_blog) {
                    $query->where('category', 'LIKE', '%' . $category_blog . '%');
                })
                    ->paginate(21);
                $data['blog']->appends(['category' => $category_blog]);
            } else {
                $data['blog'] = blog::orderBy('id', 'DESC')->paginate(21);
            }
        } else {
            $data['blog'] = blog::orderBy('id', 'DESC')->paginate(21);
        }
        return view('site.blog', $data);
    }
    public function show_blog($id, $slug = null)
    {
        if( blog::find($id)) {
            $data['navbar'] = navbar::all();
            $data['icon'] = icon::all();
            $data['setting'] = setting::all();
            $data['comment'] = comment::all();
            $data['blog'] = blog::find($id);
            SEOMeta::setTitle($data['blog']->title);
            SEOMeta::setDescription(strip_tags(mb_substr($data['blog']->text  ,0 ,210)));
            if ($slug !== $data['blog']->slug) {
                return redirect()->to($data['blog']->url);
            }
            return view('site.blog-view', $data);
        }else{
            abort(404);
        }
    }
    //end blog actions
    //start course actions
    public function index_course(){
        $data['navbar'] = navbar::all();
        $data['icon'] = icon::all();
        $data['setting'] = setting::all();
        $data['course'] = course::orderBy('id' , 'DESC')->paginate(21);
        $data['category'] = category::where('of' , 'course')->orderBy('id' , 'DESC')->get();
        return view('site.course' , $data);
    }
    public function show_course($id , $slug = null){
        if(course::find($id)) {
            $data['status'] = 0;
            if(Auth::check()){
                $usid = Auth::User()->id;
                if(count(conn::where('user_id' , $usid)->where('course_id' , $id)->get()) == 0){
                    $data['status'] = 0;
                }else{
                    $data['status'] = 1;
                }
            }
            $data['navbar'] = navbar::all();
            $data['icon'] = icon::all();
            $data['setting'] = setting::all();
            $data['course'] = course::find($id);
            $data['file'] = file::where('from_where', $id)->get();
            SEOMeta::setTitle($data['course']->title);
            SEOMeta::setDescription(strip_tags(mb_substr($data['course']->description  ,0 ,210)));
            if ($slug !== $data['course']->slug) {
                return redirect()->to($data['course']->url);
            }
            return view('site.course-view', $data);
        }else{
            abort(404);
        }
    }
    public function set_conn($id){
            $conn = new conn;
            $usid = Auth::User()->id;
            $conn->user_id = $usid;
            $conn->course_id = $id;
            if($conn->save()){
                $msg = "این دوره به دوره شما اضافه شد.";
                return back()->with('success' , $msg);
           } 
    }
}
