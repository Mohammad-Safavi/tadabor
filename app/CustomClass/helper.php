<?php

namespace App\CustomClass;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\course;
use App\Models\file;
use App\Models\setting;
use App\Models\blog;
use App\Models\navbar;
use App\Models\conn;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;

class helper
{
  public static function setSeoPage($seoData)
  {
    $setting = setting::where('id',1)->get();
    SEOMeta::setTitleDefault($setting[0]->name);
    SEOMeta::setTitle($seoData[0]);
    SEOMeta::setDescription(strip_tags(mb_substr($seoData[1], 0, 210)).'-'.$setting[0]->description);
    SEOMeta::addKeyword($seoData[2] .','. $setting[0]->keyword);
    OpenGraph::setDescription(strip_tags(mb_substr($seoData[1], 0, 210)).'-'.$setting[0]->description);
    OpenGraph::setTitle($seoData[0]);
    OpenGraph::setUrl('http://andqt.ir');
    JsonLd::setTitle($seoData[0]);
    JsonLd::setDescription(strip_tags(mb_substr($seoData[1], 0, 210)).'-'.$setting[0]->description);
  }
  public static function getGeneralData(){
    $defaultData = array(
    $data['navbar'] = navbar::all(),
    $data['icon'] = setting::where('description', '1')->select('url')->get(),
    $data['pfo'] = setting::where('url', '1')->select('name', 'description')->get(),
  );
  return $defaultData;
  }
  public static function makeSearch($data_search , $target_search){
            if ($data_search != "") {
                if($target_search == 0){
                  $target_search == 'course';
                  $view = 'site.course';
                  $data[$target_search] = course::where(function ($query) use ($data_search) {
                    $query->where('type' , 'course')->where('title', 'LIKE', '%' . $data_search . '%')
                        ->Where('description', 'LIKE', '%' . $data_search . '%');
                })->paginate(21);
                }elseif($target_search == 1){
                  $target_search == 'course';
                  $view = 'site.file';
                  $data[$target_search] = course::where(function ($query) use ($data_search) {
                    $query->where('type' , 'file')->where('title', 'LIKE', '%' . $data_search . '%')
                        ->Where('description', 'LIKE', '%' . $data_search . '%');
                })->paginate(21);
                }else{
                  $view = 'site.blog';
                  $target_search == 'blog';
                  $data[$target_search] = blog::where(function ($query) use ($data_search) {
                    $query->where('title', 'LIKE', '%' . $data_search . '%')
                        ->Where('text', 'LIKE', '%' . $data_search . '%');
                })->paginate(21);
                }
                    
                $data[$target_search]->appends(['q' => $data_search]);
            } else {
                $data[$target_search] = $target_search::orderBy('id', 'DESC')->paginate(21);
            }
           return $data[$target_search];
  }
  public static function getCategoryCourse($request, $type)
  {
    $category_course = $request->input('category');
    if ($category_course != "") {
      $data['course'] = course::where(function ($query) use ($category_course, $type) {
        $query->where('category', 'LIKE', '%' . $category_course . '%')->where('type', $type);
      })
        ->paginate(21);
      $data['course']->appends(['category' => $category_course]);
      return $data['course'];
    } else {
      $data['course'] = course::orderBy('id', 'DESC')->where('type', $type)->paginate(21);
      return $data['course'];
    }
  }
  public static function setTimeFile($id)
  {
    $data['course'] = course::find($id);
    $data['file'] = file::where('from_where', $id)->get(['time']);
    return $data['file']->sum('time');
  }
  public static function setConnAfterPay($cart)
  {
    $cart = $cart->select('user_id', 'course_id')->get();
    $arr = [];
    foreach ($cart as $item) {
      $conn = new conn();
      $conn->user_id = $item->user_id;
      $conn->course_id = $item->course_id;
      $conn->create_at = date('Y-m-d H:i:s');
      $conn->update_at = date('Y-m-d H:i:s');
      $arr[] = $conn->attributesToArray();
    }
    conn::insert($arr);
  }
  public static function updateTransaction($transaction, $receipt)
  {
    $transaction->ref_id = $receipt->getReferenceId();
    $transaction->status = 1;
    $transaction->save();
  }
}
