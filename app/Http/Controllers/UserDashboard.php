<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingAddress;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    public function profile()
    {
        // dd( Auth::user()->billing_addresses);
        return view("en.store.dashboard", [ "addresses" => Auth::user()->billing_addresses ]);
    }

    public function store_billing_address(Request $request)
    {
        $validation = $request->validate([
            "first_name"=> "required",
            "last_name"=> "required",
            "country"=> "required",
            "city"=> "required",
            "street"=> "required",
            "address"=> "required",
            "phone" => "required"
        ]);
        $validation["user_id"] = Auth::user()->id;
        BillingAddress::create($validation);
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_billing_address(Request $request)
    {
        // METHOD ARCHIVED -REASON => TO PREVENT ORDER DELETION
        // $validation = $request->validate([
        //     "item_id" => "exists:billing_address,id"
        // ]);
        // $id = $request->item_id;
        // BillingAddress::destroy($id);
        return redirect()->back();
    }
}
