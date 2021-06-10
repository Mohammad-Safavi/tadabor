<?php

namespace App\Http\Controllers;

use App\Mail\testMail;
use Illuminate\Http\Request;
use App\Models\navbar;
use App\Models\setting;
use Illuminate\Support\Facades\Mail;
class shopController extends Controller
{
    public function index_shop()
    {
        $data['navbar'] = navbar::all();
        $data['setting'] = setting::all();
        $data['description'] = "فروشگاه اندیشکده قرآنی تدبر";
        $data['keyword'] = "";
        $data['page_name'] = "فروشگاه";
        return view('site.shop', $data);
    }
    public function create_product(){
        return view('panel.product-create');
    }
    public function email_index(){
        return view('emails.createEmail');
    }
    public function store_email(Request $request){
        $setting = setting::get();
        $siteName = $setting[0]->name;
        Mail::to('mohammadsafavi999@yahoo.com')->send(new testMail($siteName));
    }
}
