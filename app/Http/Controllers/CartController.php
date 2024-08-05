<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requests()
    {
        $shipping_cost = SiteConfig::where("key", "shipping_cost")->get()[0]->value;
        return view("en.admin.requests", ["orders"=>Order::latest()->Where( [["status", "=", 1]])->get(), "shipping_cost" => $shipping_cost] );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping_cost = SiteConfig::where("key", "shipping_cost")->get()[0]->value;
        return view("en.store.cart", ["orders"=>Order::latest()->Where([["user_id", "=", Auth::user()->id], ["status", "=", 0]])->get(), "shipping_cost" => $shipping_cost]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validation = $request->validate([
            "item_id" => "exists:Orders,id"
        ]);
        $id = $request->item_id;
        Order::destroy($id);
        return redirect()->back();
    }

    public function checkout()
    {
        Order::Where("user_id", "=", Auth::user()->id)->update(["status"=>1]);
        return $this->index();
    }
}
