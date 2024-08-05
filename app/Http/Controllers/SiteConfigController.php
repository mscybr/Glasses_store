<?php

namespace App\Http\Controllers;

use App\Models\SiteConfig;
use Illuminate\Http\Request;

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

    public function edit_shipping( Request $request ){
        $validation = $request->validate([
            "cost" => "required|numeric"
        ]);
        SiteConfig::where("key", "shipping_cost")->update(["value" => $validation["cost"]]);
        return $this->create();
    }

    public function create(){
        return view("en.admin.create_site_config", ["shiping_cost" => SiteConfig::where("key", "shipping_cost")->get()[0]->value]);
    }
}
