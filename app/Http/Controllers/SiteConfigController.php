<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiteConfigController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $shipping_cost = SiteConfig::where("key", "shipping_cost")->count();
        if($shipping_cost == 0) SiteConfig::create(["key"=>"shipping_cost", "value"=>0]);
    }

    public function toggle_currency( Request $request ){

        $validation = $request->validate([
            "currency" => "required",
        ]);
        // $response = new Response( redirect()->back() );
        // ;
        // $response->withCookie(cookie('currency', $request->currency));

        return redirect()->back()->withCookie(cookie('currency', $request->currency));
        // return $response;
    }

    public function delete_currency( Request $request ){

        $validation = $request->validate([
            "item_id" => "required",
        ]);

        $currencies = SiteConfig::where("key", "currencies");
        // dd();
        if( $currencies->count() == 0 ){
            $currencies = [];
        }else{
            $currencies = (array)json_decode($currencies->get()[0]->value);
        }

        unset($currencies[$request->item_id]);

        SiteConfig::where("key", "currencies")->update(["value" => json_encode($currencies)]);
        return redirect()->back();
    }

    public function add_currency( Request $request ){

        $validation = $request->validate([
            "cost" => "required|numeric",
            "currencyName" => "required|string",
            "currencySymbol" => "required|string"
        ]);

        $currencies = SiteConfig::where("key", "currencies");
        // dd();
        if( $currencies->count() == 0 ){
            $currencies = [];
        }else{
            $currencies = (array)json_decode($currencies->get()[0]->value);
        }

        $currencies[$request->currencyName] = [
            "cost" => $request->cost,
            "currencySymbol" => $request->currencySymbol
        ];

        SiteConfig::where("key", "currencies")->update(["value" => json_encode($currencies)]);
        return redirect()->back();
        // return $this->create();
    }

    public function edit_shipping( Request $request ){
        $validation = $request->validate([
            "cost" => "required|numeric"
        ]);
        SiteConfig::where("key", "shipping_cost")->update(["value" => $validation["cost"]]);
        return $this->create();
    }

    public function create(){
        $currencies = SiteConfig::where("key", "currencies");
        // dd();
        if( $currencies->count() == 0 ){
            SiteConfig::create(["key" => "currencies", "value" => json_encode([])]);    
            $currencies = [];
        }else{
            $currencies = json_decode($currencies->get()[0]->value);
        }
        return view("en.admin.create_site_config", ["shiping_cost" => SiteConfig::where("key", "shipping_cost")->get()[0]->value, "currencies" => $currencies]);
    }
}
