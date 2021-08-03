<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\cart;
use App\Models\category;
use App\Models\comment;
use App\Models\conn;
use App\Models\course;
use App\Models\discount;
use App\Models\file;
use App\Models\item;
use App\Models\message;
use App\Models\navbar;
use App\Models\page;
use App\Models\setting;
use App\Models\transaction;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Auth;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\CustomClass\helper;

class siteController extends Controller
{
    //start site actions
    public function index_site()
    {
        $data['defaultData'] = helper::getGeneralData();
        $data['item'] = item::all();
        $seoData = array('خانه', '', '');
        helper::setSeoPage($seoData);
        if (Auth::check()) {
            $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        }
        return view('site.index', $data);
    }
    public function index_dashboard()
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('داشبورد', '', '');
        helper::setSeoPage($seoData);
        $data['keyword'] = "";
        $data['description'] = "";
        $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        return view('site.dashboard', $data);
    }
    public $total_final;
    public function cart_dashboard(Request $request)
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('سبد خرید', '', '');
        helper::setSeoPage($seoData);
        $data['cart'] = cart::where('user_id', Auth::User()->id)->join('courses', 'courses.id', '=', 'cart.course_id')->get();
        if (\request()->has('discount')) {
            $data['discount_code'] = $request->input('discount');
            $discount = discount::where('code', $data['discount_code'])->first();
            if (isset($discount)) {
                $discount_value = $discount->value;
                $data['total'] = $data['cart']->sum('price');
                $data['discount'] = $data['total'] / 100 * $discount_value;
                $data['total_final'] = $data['total'] - $data['discount'];
                session_start();
                $_SESSION['total_final'] = $data['total_final'];
                $msg = "کد تخفیف شما اعمال شد.";
                return view('site.dashboard-cart', $data)->with('success', $msg);
            } else {
                $msg = "کد تخفیف شما همخوانی ندارد.";
                return back()->with('danger', $msg);
            }
        } else {
            $data['total'] = $data['cart']->sum('price');
            $data['discount'] = 0;
            $data['total_final'] = $data['total'];
            session_start();
            $_SESSION['total_final'] = $data['total_final'];
            return view('site.dashboard-cart', $data);
        }
    }
    public function password_dashboard()
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('تغییر رمز عبور', '', '');
        helper::setSeoPage($seoData);
        $data['keyword'] = "";
        $data['description'] = "";
        $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        return view('site.dashboard-password', $data);
    }
    public function payment_dashboard()
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('تغییر رمز عبور', '', '');
        helper::setSeoPage($seoData);
        $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        $data['transaction'] = transaction::orderBy('id', 'DESC')->where('user_id', Auth::User()->id)->get();
        return view('site.dashboard-payment', $data);
    }
    public function course_dashboard()
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('آرشیو من', '', '');
        helper::setSeoPage($seoData);
        $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        $conn = conn::where('user_id', Auth::User()->id);
        $data['conn'] = $conn->get();
        $data['conn'] = $conn->join('courses', 'courses.id', '=', 'conns.course_id')->get();
        return view('site.dashboard-course', $data);
    }
    //end site actions
    //start page actions
    /**
     * @param int $id
     */
    public function show_page($id)
    {
        if (page::find($id)) {
            $data['page'] = page::find($id);
            $data['defaultData'] = helper::getGeneralData();
            $seoData = array($data['page']->title, '', '');
            helper::setSeoPage($seoData);
            if (Auth::check()) {
                $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
            }
            if (page::where('id', $id)->first()) {
                return view('site.page-view', $data);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
    //end page actions
    //start message actions
    public function store_message(Request $request)
    {
        $request->validate(message::$createRules, message::$message);
        if (message::create($request->all())) {
            return response()->json([
                'success' => true,
                'message' => "دیدگاه شما با موفقیت ثبت شد",
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => "در ثبت دیدگاه مشکلی پیش آمده.",
            ]);
        }
    }
    //end message actions
    //start message actions
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    public function store_comment(Request $request)
    {
        $request->validate(comment::$createRules, comment::$message);
        comment::create($request->all());
        return response()->json([
            'success' => true,
            'message' => "دیدگاه شما با موفقیت ثبت شد",
        ]);
    }
    //end message actions
    //start blog actions
    public function index_blog(Request $request, $slug = null)
    {
        $data['defaultData'] = helper::getGeneralData();
        $data['category'] = category::where('of', 'blog')->get();
        $seoData = array('وبلاگ', '', '');
        helper::setSeoPage($seoData);
        if (Auth::check()) {
            $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        }
        if (\request()->has('q')) {
            $data_search = $request->input('q');
            $target_search = $request->input('wt');
            $data['blog'] = helper::makeSearch($data_search, $target_search);
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
        if (blog::find($id)) {
            $data['defaultData'] = helper::getGeneralData();
            $seoData = array($data['blog']->title, $data['blog']->text, '');
            helper::setSeoPage($seoData);
            $data['comment'] = comment::all();
            $data['blog'] = blog::find($id);
            if (Auth::check()) {
                $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
            }
            if ($slug !== $data['blog']->slug) {
                return redirect()->to($data['blog']->url);
            }
            return view('site.blog-view', $data);
        } else {
            abort(404);
        }
    }
    //end blog actions
    //start course actions
    public function index_course(Request $request)
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('دوره ها','', '');
        helper::setSeoPage($seoData);
        if (Auth::check()) {
            $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        }
        if (\request()->has('category')) {
            $type = 'course';
            $data['course'] = helper::getCategoryCourse($request, $type);
        } else {
            $data['course'] = course::orderBy('id', 'DESC')->where('type', 'course')->paginate(21);
        }
        if (\request()->has('q')) {
            $data_search = $request->input('q');
            $target_search = $request->input('wt');
            $data['course'] = helper::makeSearch($data_search, $target_search);
        }
        $data['category'] = category::where('of', 'course')->orderBy('id', 'DESC')->get();
        return view('site.course', $data);
    }
    public function index_file(Request $request)
    {
        $data['defaultData'] = helper::getGeneralData();
        $seoData = array('فایل ها' ,'', '');
        helper::setSeoPage($seoData);
        if (Auth::check()) {
            $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
        }
        if (\request()->has('category')) {
            $type = 'file';
            $data['course'] = helper::getCategoryCourse($request, $type);
        } else {
            $data['course'] = course::orderBy('id', 'DESC')->where('type', 'file')->paginate(21);
        }
        if (\request()->has('q')) {
            $data_search = $request->input('q');
            $target_search = $request->input('wt');
            $data['course'] = helper::makeSearch($data_search, $target_search);
        }
        $data['category'] = category::orderBy('id', 'DESC')->where('of', 'file')->get();
        return view('site.file', $data);
    }
    public function show_course($id, $slug = null)
    {
        if (course::find($id)) {
            $data['status'] = 0;
            if (Auth::check()) {
                $usid = Auth::User()->id;
                if (count(conn::where('user_id', $usid)->where('course_id', $id)->get()) == 0) {
                    $data['status'] = 0;
                } else {
                    $data['status'] = 1;
                }
            }

            $data['course'] = course::find($id);
            $data['defaultData'] = helper::getGeneralData();
            $data['file'] = file::where('from_where', $id)->get();
            $conn = conn::where('course_id', $id)->get();
            $data['total_student'] = $conn->count('user_id');
            $seoData = array($data['course']->title, $data['course']->description, $data['course']->keyword);
            helper::setSeoPage($seoData);
            $data['total_time'] = helper::setTimeFile($id);
            if (Auth::check()) {
                $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
            }
            if ($slug !== $data['course']->slug) {
                return redirect()->to($data['course']->url);
            }
            return view('site.course-view', $data);
        } else {
            abort(404);
        }
    }
    public function show_file($id, $slug = null)
    {
        if (course::find($id)) {
            $data['status'] = 0;
            if (Auth::check()) {
                $usid = Auth::User()->id;
                if (count(conn::where('user_id', $usid)->where('course_id', $id)->get()) == 0) {
                    $data['status'] = 0;
                } else {
                    $data['status'] = 1;
                }
            }
            $data['course'] = course::find($id);
            $data['defaultData'] = helper::getGeneralData();
            $seoData = array($data['course']->title ,$data['course']->description, $data['course']->keyword);
            helper::setSeoPage($seoData);
            $data['file'] = file::where('from_where', $id)->get();
            $conn = conn::where('course_id', $id)->get();
            $data['total_student'] = $conn->count('user_id');
            $data['total_time'] = helper::setTimeFile($id);
            if (Auth::check()) {
                $data['cart'] = cart::where('user_id', Auth::User()->id)->get();
            }
            if ($slug !== $data['course']->slug) {
                return redirect()->to($data['course']->url);
            }
            return view('site.file-view', $data);
        } else {
            abort(404);
        }
    }
    public function add_cart(Request $request, $id)
    {
        if (count(cart::where('user_id', Auth::User()->id)->where('course_id', $id)->get()) == 0) {
            $cart = new cart;
            $cart->user_id = Auth::User()->id;
            $cart->course_id = $id;
            if ($cart->save()) {
                $msg = "این محصول به سبد خرید شما اضافه شد.";
                return back()->with('success', $msg);
            } else {
                $msg = "مشکلی در عملیات پیش آمده است!";
                return back()->with('danger', $msg);
            }
        } else {
            $msg = "این محصول در سبد خرید شما موجود است.";
            return back()->with('danger', $msg);
        }
    }
    public function destroy_cart($id)
    {
        $cart = cart::find($id);
        if (isset($cart)) {
            $cart->delete();
            $msg = "محصول با موفقیت از سبد خرید شما حذف شد.";
            $st = 'success';
        } else {
            $msg = "عملیات با خطا روبه رو شد.";
            $st = 'danger';
        }
        return back()->with($st, $msg);
    }
    public function set_conn()
    {
        $conn = new conn;
        $usid = Auth::User()->id;
        $conn->user_id = $usid;
        $conn->course_id = $id;
        if ($conn->save()) {
            $msg = "این دوره به دوره شما اضافه شد.";
            return back()->with('success', $msg);
        }
    }
    public function buy()
    {
        session_start();
        return Payment::purchase(
            (new Invoice)->amount(intval($_SESSION['total_final'])),
            function ($driver, $transactionId) {
                $transaction = new transaction;
                $transaction->transaction_id = $transactionId;
                $transaction->user_id = Auth::User()->id;
                $transaction->status = 0;
                $transaction->price = intval($_SESSION['total_final']);
                $transaction->save();
            }
        )->pay()->render();
    }
    public function buy_get()
    {
        abort(404);
    }
    public function status()
    {
        if (\request()->has('Authority', 'Status')) {
            session_start();
            $transaction = transaction::where('user_id', Auth::User()->id)->orderBy('id', 'DESC')->first();
            try {
                $receipt = Payment::amount(intval($_SESSION['total_final']))->transactionId($transaction->transaction_id)->verify();
                $cart = cart::where('user_id', Auth::User()->id);
                helper::setConnAfterPay($cart);
                helper::updateTransaction($transaction, $receipt);
                $msg = "پرداخت شما به مبلغ " . number_format($transaction->price) . " تومان با کد رهگیری " . $transaction->transaction_id . " با موفقیت انجام شد.";
                session_destroy();
                $cart->delete();
                return redirect(Route('payment.dashboard'))->with('transaction_ok', $msg);
            } catch (InvalidPaymentException $exception) {
                $msg = $exception->getMessage();
                return redirect(Route('payment.dashboard'))->with('transaction_no', $msg);
            }
        } else {
            abort(404);
        }
    }
}
