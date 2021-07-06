<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Models\comment;
use App\Models\course;
use App\Models\discount;
use App\Models\item;
use App\Models\message;
use App\Models\navbar;
use App\Models\page;
use App\Models\setting;
use App\Models\User;
use App\Models\file;
use App\Models\conn;
use App\Models\transaction;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Whoops\Run;

class panelController extends Controller
{
    //start panel action
    public function index_panel()
    {
        $transaction = transaction::where('status' , 1 )->get();
        $total = $transaction->sum('price');
        return view('panel.index' , compact('total'));
    }
    //end panel action
    //****
    //start blog actions
    public function index_blog()
    {
        $data['blog'] = blog::orderBy('id', 'DESC')->get();
        return view('panel.blog', $data);
    }

    public function create_blog()
    {
        $data['category'] = category::where('of' , 'blog')->get();
        return view('panel.blog-create', $data);
    }

    public function store_blog(Request $request)
    {
        $request->validate(blog::$createRules, blog::$message);
        if ($request->hasFile('name_pic')) {
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('blog-picture', $filename);
        }
        if (blog::create($request->all())) {
            $msg = "نوشته شما با موفقیت ایجاد شد.";
            return redirect(Route('blog.index'))->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger', $msg);
        }
    }

    public function edit_blog($id)
    {
        if (blog::find($id)) {
            $data['category'] = category::all();
            $data['blog'] = blog::find($id);
            return view('panel.blog-update', $data);
        } else {
            abort(404);
        }
    }

    public function update_blog(Request $request, $id)
    {
        $blog = blog::find($id);
        $request->validate(blog::$createRulesUpdate, blog::$message);
        if ($request->hasFile('name_pic')) {
            $image_path = 'uploads/blog-picture' . $blog->name_pic;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('blog-picture', $filename);
        }
        if ($blog->update($request->all())) {
            $msg = "نوشته شما با موفقیت ویرایش شد.";
            return redirect(Route('blog.index'))->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger', $msg);
        }
    }

    public function destroy_blog($id)
    {
        $blog = blog::find($id);
        $comment = comment::where('blog_id', $id);
        $image_path = 'uploads/blog-picture' . $blog->name_pic;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if ($comment->get()) {
            $comment->delete();
        }
        if ($blog->delete()) {
            $msg = "صفحه بلاگ شما با موفقیت حذف شد.";
            return redirect(Route('blog.index'))->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('blog.index'))->with('danger', $msg);
        }
    }
    //end blog actions
    //start page actions
    public function index_page()
    {
        $data['page'] = page::orderBy('id', 'desc')->get();
        return view('panel.page', $data);
    }

    public function create_page()
    {
        return view('panel.page-create');
    }

    public function store_page(Request $request)
    {
        $request->validate(item::$createRules, item::$message);
        if (page::create($request->all())) {
            $msg = "صفحه جدید با موفقیت ایجاد شد.";
            return redirect(Route('page.index'))->with('success', $msg);
        } else {
            $msg = "عملیات ثبت با خطا روبه رو شد.";
            return redirect(Route('page.index'))->with('danger', $msg);
        }
    }

    public function edit_page($id)
    {
        $data['page'] = page::find($id);
        return view('panel.page-update', $data);
    }

    public function update_page(Request $request, $id)
    {
        $page = page::find($id);
        $request->validate(item::$createRules, item::$message);
        if ($page->update($request->all())) {
            $msg = "ویرایش صفحه با موفقیت ایجاد شد.";
            return redirect(Route('page.index'))->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return redirect(Route('page.index'))->with('danger', $msg);
        }
    }

    public function destroy_page($id)
    {
        $page = page::find($id);
        if ($page->delete()) {
            $msg = "حذف با موفقیت انجام شد.";
            return redirect(Route('page.index'))->with('suucess', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return redirect(Route('page.index'))->with('danger', $msg);
        }
    }
    //end page actions
    //****
    //start navbar actions
    public function index_navbar()
    {
        $data['navbar'] = navbar::all();
        $data['blog'] = blog::all();
        $data['page'] = page::all();
        return view('panel.navbar', $data);
    }
    public function store_navbar(Request $request){
        if(navbar::create($request->all())){
            $msg = "آدرس شما باموفقیت اضافه شد.";
            $st = "success";
        }else{
            $msg = "مشکلی در عملیات رخ داده است.";
            $st = "danger";
        }
        return back()->with($st , $msg);
    }
    public function update_navbar(Request $request)
    {
        $navbar = navbar::findOrFail($request->nav_id);
        $messages = [
            'title.required' => 'لطفا فیلد عنوان را پر کنید.',
            'title.max' => 'عنوان شما نباید بیشتر از ۲۰ حرف باشد.',
        ];
        $validated = $request->validate([
            'title' => 'required|max:20',
        ], $messages);
        if ($navbar->update($request->all())) {
            $msg = "ویرایش با موفقیت انجام شد.";
            return redirect(Route('navbar.index'))->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return redirect(Route('navbar.index'))->with('danger', $msg);
        }
    }
    //end navbar actions
    //****
    //start icon actions
    public function update_icon(Request $request, $id)
    {
        $icon = setting::find($id);
        $icon->url = $request->input('url');
        if ($icon->save()) {
            $msg = "ویرایش با موفقیت انجام شد.";
            return  back()->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return back()->with('danger', $msg);
        }
    } 
    public function update_pfo(Request $request, $id)
    {
        if(setting::find($id)){
        $pfo = setting::find($id);
        $pfo->name = $request->input('name');
        $pfo->description = $request->input('description');
        $pfo->url = '1';
        if ($pfo->save()) {
            $msg = "ویرایش با موفقیت انجام شد.";
            return  back()->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return back()->with('danger', $msg);
        }
    }else{
        abort(404);
    }
    }
    //end icon actions
    //****
    //start message actions
    public function index_message()
    {
        $data['message'] = message::orderBy('id', 'desc')->get();
        return view('panel.message', $data);
    }

    public function destroy_message($id)
    {
        $message = message::find($id);
        if ($message->delete()) {
            $msg = "حذف با موفقیت انجام شد.";
            return redirect(Route('message.index'))->with('success', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return redirect(Route('message.index'))->with('danger', $msg);
        }
    }

    public function destroy_all_message()
    {
        message::truncate();
        if (message::truncate()) {
            $msg = "حذف با موفقیت انجام شد.";
            return redirect(Route('message.index'))->with('success', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return redirect(Route('message.index'))->with('danger', $msg);
        }
    }
    //end message actions
    //start comment actions
    public function index_comment(Request $request)
    {
        if (\request()->has('qc')) {
            $search = $request->input('qc');
            if ($search != "") {
                $data['comment'] = comment::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('blog_title', 'LIKE', '%' . $search . '%');
                })->get();
            } else {
                $data['comment'] = comment::orderBy('id', 'DESC')->get();
            }
        } else {
            $data['comment'] = comment::orderBy('id', 'desc')->get();
        }

        return view('panel.comment', $data);
    }

    public function update_comment(Request $request, $id)
    {
    if(comment::find($id)){
        $comment = comment::find($id);
        $comment->status = $request->input('status');
        if($comment->save()){
            $msg = "دیدگاه با موفقیت منتشر شد.";
            $st = "success";
        }else{
            $msg = "مشکلی در عملیات رخ داده است.";
            $st = "danger";
        }
        return back()->with($st , $msg);
    }else{
        abort(404);
    }
        
    }

    public function destroy_comment($id)
    {
        $comment = comment::find($id);
        if ($comment->delete()) {
            $msg = "حذف با موفقیت انجام شد.";
            return redirect(Route('comment.index'))->with('success', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return redirect(Route('comment.index'))->with('danger', $msg);
        }
    }

    public function destroy_all_comment()
    {
        if (comment::truncate()) {
            $msg = "حذف با موفقیت انجام شد.";
            return redirect(Route('comment.index'))->with('success', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return redirect(Route('comment.index'))->with('danger', $msg);
        }
    }
    //end comment actions
    //start setting actions
    public function index_setting()
    {
        $data['setting'] = setting::all();
        $data['icon'] = setting::where('description' , '1')->select('id' , 'name' , 'url' , 'updated_at')->get();
        $data['pfo'] = setting::where('url' , '1')->select('id' , 'name' , 'description')->get();
        return view('panel.setting', $data);
    }

    public function update_setting(Request $request, $id)
    {
        $setting = setting::find($id);
        $request->validate(setting::$createRules, setting::$message);
        if ($setting->update($request->all())) {
            $msg = "ویرایش با موفقیت انجام شد.";
            return redirect(Route('setting.index'))->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return redirect(Route('setting.index'))->with('danger', $msg);
        }
    }
    //end setting actions
    //start category actions
    public function index_category1()
    {
        $category = category::where('of', 'blog')->get();
        return view('panel.blog-category', compact('category'));
    }

    public function index_category2()
    {
        $category = category::where('of', 'course')->get();
        return view('panel.course-category', compact('category'));
    }
    public function index_category3()
    {
        $category = category::where('of', 'file')->get();
        return view('panel.file-category', compact('category'));
    }

    public function store_category(Request $request)
    {
        $request->validate(category::$createRules, category::$message);
        if (category::create($request->all())) {
            $msg = "عملیات ایجاد با موفقیت انجام شد.";
            return back()->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return back()->with('danger', $msg);
        }
    }

    public function destroy_category($id)
    {
        $category = category::find($id);
        if ($category->delete()) {
            $msg = "عملیات حذف با موفقیت انجام شد.";
            return back()->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return back()->with('danger', $msg);
        }
    }
    //end category actions
    //start item actions
    public function index_item()
    {
        $data['item'] = item::all();
        $data['blog'] = blog::all();
        $data['page'] = page::all();
        return view('panel.item', $data);
    }

    public function update_item(Request $request)
    {
        $item = item::findOrFail($request->item_id);
        if ($item->update($request->all())) {
            $msg = "ویرایش با موفقیت انجام شد.";
            return redirect(Route('item.index'))->with('success', $msg);
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
            return redirect(Route('item.index'))->with('danger', $msg);
        }
    }
    //end item actions
    //start course action
    public function index_course(Request $request)
    {
        $data['course'] = course::all();
        $data['file'] = file::orderBy('id', 'DESC')->get();
        return view('panel.course', $data);
    }

    public function create_course()
    {
        $category = category::where('of', 'course')->get();
        return view('panel.course-create', compact('category'));
    }

    public function edit_course($id)
    {
        $data['course'] = course::find($id);
        $data['category'] = category::where('of', 'course')->get();
        return view('panel.course-update', $data);
    }

    public function update_course(Request $request, $id)
    {
        $request->validate(course::$createRulesUpdate, course::$message);
        $course = course::find($id);
        if ($request->hasFile('name_pic')) {
            $image_path = 'uploads/course-picture' . $course->name_pic;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('course-picture', $filename);
        }
        if ($course->update($request->all())) {
            $msg = "دوره شما با موفقیت ویرایش شد.";
            return redirect(Route('course.index'))->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('course.index'))->with('danger', $msg);
        }
    }

    public function store_course(Request $request)
    {
        $request->validate(course::$createRules, course::$message);
        if ($request->hasFile('name_pic')) {
            $file = $request->file('name_pic');
            $filename = $file;
            $file->storeAs('course-picture', $filename);
        }
        if (course::create($request->all())) {
            $msg = "دوره شما با موفقیت ایجاد شد.";
            return redirect(Route('course.index'))->with('success', $msg);
        } else {
            $msg = "خطایی در ایجاد دوره رخ داده است.";
            return redirect(Route('course.index'))->with('danger', $msg);
        }
    }
    public function student_course($id){
        $conn = conn::where('course_id', $id);
        $data['conn'] = $conn->get();
        $data['conn'] = $conn->join('users', 'users.id', '=', 'conns.user_id')->get();
        return view('panel.course-student' , $data);
    }

    public function upload_course(Request $request)
    {
        $files = new file;
        $files->name = $request->input('name');
        $files->description = $request->input('description');
        $files->price = $request->input('price');
        $files->from_where = $request->input('from_where');
        $file = $request->file('file');
        $filename = $file;
        $files->file = $filename;
        $files->ext = $file->getClientOriginalExtension();
        $file->storeAs('course-file', $filename);
        $id = $request->input('from_where');
        $count = file::where('from_where', $id)->get();
        $course = course::find($id);
        $course->up = (count($count)) + 1;
        if ($files->save() && $course->save()) {
            $msg = "فایل دوره با موفقیت بارگذاری شد.";
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        } else {
            $msg = "خطایی در آپلود رخ داده است.";
            return response()->json([
                'success' => false,
                'message' =>$msg,
            ]);
        }
    }

    public function show_file($id)
    {
        if (course::find($id)) {
            $data['course'] = course::select('id')->find($id);
            $data['file'] = file::orderBy('id' , 'DESC')->where('from_where' , $id)->get();
            return view('panel.course-file' , $data);
        } else {
            abort(404);
        }
    }


    public function destroy_course($id)
    {
        if (course::find($id)) {
            $course = course::find($id);
            if (count(file::where('from_where', $id)->get()) > 0) {
                $msg = "شما در این دوره فایل دارید! ابتدا فایل های دوره را پاک کنید.";
                return redirect(Route('course.index'))->with('danger', $msg);
            } else {
                if ($course->delete()) {
                    $image_path = 'uploads/course-picture' . $course->name_pic;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                    $msg = "دوره شما با موفقیت حذف شد.";
                    return back()->with('success', $msg);
                }
            }
        }
    }

    public function destroy_file($id)
    {
        if (file::find($id)) {
            $file = file::find($id);
            if ($file->delete()) {
                $image_path = 'uploads/course-file' . $file->file;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                $msg = "فایل دوره با موفقیت حذف شد.";
                $st = 'success';
            }else{
                $msg = "مشکلی در عملیات به وجود آمده است.";
                $st = 'danger';
            }
            return back()->with($st , $msg);
        }else{
            abort(404);
        }
    }
    //start action discount
    public function index_discount()
    {
        $discount = discount::orderBy('id', 'DESC')->get();
        return view('panel.discount', compact('discount'));
    }
    public function store_discount(Request $request)
    {
        $request->validate(discount::$createRules, discount::$message);
        if (discount::create($request->all())) {
            $msg = "کد شما با موفقیت در پایگاه داده ثبت شد.";
            $st = 'success';
        } else {
            $msg = "مشکلی در انجام عملیات پیش آمده است!";
            $st = 'danger';
        }
        return back()->with($st, $msg);
    }
    public function destroy_discount($id)
    {
        $discount = discount::find($id);
        if ($discount->delete()) {
            $msg = "کد شما با موفقیت حذف شد.";
            $st = 'success';
        } else {
            $msg = "مشکلی در انجام عملیات پیش آمده است!";
            $st = 'danger';
        }
        return back()->with($st, $msg);
    }
    public function index_transaction(Request $request){
        if (\request()->has('qt' , 'qtc')) {
            $search = $request->input('qt');
            $cat = $request->input('qtc');
            if ($search != "") {
                $data['transaction'] = transaction::where(function ($query) use ($search , $cat) {
                    $query->where($cat , 'LIKE', '%' . $search . '%');
                    })->get();
            } else {
                $data['transaction'] = transaction::orderBy('id', 'DESC')->get();
            }
        } else {
            $data['transaction'] = transaction::orderBy('id', 'desc')->get();
        }
        return view('panel.transaction', $data);
    }
    public function create_file(){
        $data['category'] = category::where('of' , 'file')->get();
        return view('panel.file-create' , $data);   
    }
    public function destroy_transaction(){

        if (transaction::truncate()) {
            $msg = "حذف با موفقیت انجام شد.";
            return back()->with('success', $msg);
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
            return back()->with('danger', $msg);
        }
    }
}
