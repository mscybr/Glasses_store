<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            "size" => "required|string",
            "amount" => "required|numeric",
            "color" => "required|string",
            "lens" => "string",
        ]);
        $validation["user_id"] = Auth::user()->id;
        $product = Product::find($request->product_id);
        $validation["price"] = $product->price - ($product->price * $product->sale);
        if($validation){
            Order::create($validation);
            // return $this->create();
            return redirect()->route("cart_items");
        }else{
             return redirect()->back()->withErrors($validation)->withInput();
        }
    }

    public function reject( Request $request ){
        $validation = $request->validate([
            "order_id" => "required|exists:orders,id",
            "rejection_message" => "required"
        ]);
        if($validation) Order::Where( "id", $validation["order_id"])->update(["status" => 2, "rejection_message" => $validation["rejection_message"]]);
        return redirect()->back();
    }

    public function accept( Request $request ){
        $validation = $request->validate([
            "order_id" => "required|exists:orders,id"
        ]);
        if($validation) Order::find($validation["order_id"])->update(["status" => 3]);
        return redirect()->back();
    }
}
