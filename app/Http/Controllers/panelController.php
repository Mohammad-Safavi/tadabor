<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\category;
use App\Models\comment;
use App\Models\icon;
use App\Models\item;
use App\Models\message;
use App\Models\navbar;
use App\Models\page;
use App\Models\setting;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class panelController extends Controller
{
      //start panel action
    public function index_panel()
    {
        return view('panel.index');
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
        $data['category'] = category::all();
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
        $comment = comment::where('blog_id' , $id);
        $image_path = 'uploads/blog-picture' . $blog->name_pic;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        if($comment->get()){
            $comment->delete();
        }
        if ($blog->delete()) {
            $msg = "صفحه بلاگ شما با موفقیت حذف شد.";
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
        }
        return redirect(Route('blog.index'))->with('danger', $msg);
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
        } else {
            $msg = "عملیات ثبت با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('success', $msg);

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
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('success', $msg);

    }

    public function destroy_page($id)
    {
        $page = page::find($id);
        if ($page->delete()) {
            $msg = "حذف با موفقیت انجام شد.";
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('page.index'))->with('danger', $msg);


    }
    //end page actions
    //****
    //start navbar actions
    public function index_navbar()
    {
        $data['navbar'] = navbar::all();
        $data['icon'] = icon::all();
        $data['blog'] = blog::all();
        $data['page'] = page::all();
        return view('panel.navbar', $data);
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
        $icon = icon::find($id);
        $icon->url = $request->input('url');
        if ($icon->save()) {
            $msg = "ویرایش با موفقیت انجام شد.";
        } else {
            $msg = "عملیات ویرایش با خطا روبه رو شد.";
        }
        return redirect(Route('navbar.index'))->with('success', $msg);


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
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('message.index'))->with('danger', $msg);

    }

    public function destroy_all_message()
    {
        message::truncate();
        if (message::truncate()) {
            $msg = "حذف با موفقیت انجام شد.";
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('message.index'))->with('danger', $msg);

    }
    //end message actions
    //start comment actions
    public function index_comment(Request $request)
    {
        if (\request()->has('qc')) {
            $search = $request->input('qc');
            if ($search != "") {
                $data['comment'] = comment::where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')->orWhere('last_name', 'LIKE', '%' . $search . '%')
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
        $comment = comment::find($id);
        $comment->status = $request->input('status');
        if ($comment->save()) {
            $msg = "دیدگاه مورد نظر با موفقیت منتشر شد.";
            return redirect(Route('comment.index'))->with('success', $msg);
        } else {
            $msg = "خطا در انتشار.";
            return redirect(Route('comment.index'))->with('danger', $msg);
        }

    }

    public function destroy_comment($id)
    {
        $comment = comment::find($id);
        if ($comment->delete()) {
            $msg = "حذف با موفقیت انجام شد.";
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('comment.index'))->with('danger', $msg);

    }

    public function destroy_all_comment()
    {
        if (comment::truncate()) {
            $msg = "حذف با موفقیت انجام شد.";
        } else {
            $msg = "عملیات حذف با خطا روبه رو شد.";
        }
        return redirect(Route('comment.index'))->with('danger', $msg);

    }
    //end comment actions
    //start setting actions
    public function index_setting()
    {
        $setting = setting::all();
        return view('panel.setting', compact('setting'));
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
    public function index_category()
    {
        $category = category::all();
        return view('panel.category', compact('category'));
    }

    public function store_category(Request $request)
    {
        $category = new category();
        $category->title = $request->input('title');
        if ($category->save()) {
            $msg = "عملیات ایجاد با موفقیت انجام شد.";
            return redirect(Route('category.index'))->with('success', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('category.index'))->with('danger', $msg);
        }
    }

    public function destroy_category($id)
    {
        $category = category::find($id);
        if ($category->delete()) {
            $msg = "عملیات حذف با موفقیت انجام شد.";
            return redirect(Route('category.index'))->with('danger', $msg);
        } else {
            $msg = "اختلالی در سیستم رخ داد بار دگر امتحان کنید.";
            return redirect(Route('category.index'))->with('danger', $msg);
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

}
