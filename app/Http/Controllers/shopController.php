<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\navbar;
use App\Models\setting;
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
}
