<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            "product_id" => "required|exists:products,id",
            "rate" => "required|numeric",
            "description" =>"string|nullable"
        ]);
        if($validation){
            if( isset($validation["description"]) == false) $validation["description"] = "";
            $user_id = Auth::user()->id;
            $validation["user_id"] = $user_id;
            $review = Review::latest()->Where("user_id", "=", $user_id)->Where("product_id", "=", $validation["product_id"]);
            $count = $review->count();
            if ($count > 0) {
                $review->delete();
            }
            Review::create($validation);
                // return $this->create();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors($validation)->withInput();
        }

    }
}
