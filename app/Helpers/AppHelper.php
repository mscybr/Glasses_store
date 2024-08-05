<?php
namespace App\Helpers;

class AppHelper
{
      public function combine_get($array, $request_array = "empty")
      {
        if($request_array == "empty") $request_array = request()->all();
        // ['Subcategory' => $subcategory->id]
             return url()->current().'?'.http_build_query(array_merge($request_array,$array));
      }

     public static function instance()
     {
         return new AppHelper();
     }
}