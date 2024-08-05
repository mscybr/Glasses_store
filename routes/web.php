<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LensController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SiteConfigController;
use App\Http\Controllers\SubcategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/logout', [UserController::class, "logout"])->name("logout");
Route::get('/register', [UserController::class, "create"])->name("register_form");
Route::get('/login', [UserController::class, "login"])->name("login_form");
Route::post('/authenticate', [UserController::class, "authenticate"])->name("authenticate");
Route::post('/register', [UserController::class, "store"])->name("register");

Route::get("shop", [ProductController::class, "index"])->name("shop");
Route::get("shop/product/{product_id}", [ProductController::class,  "show"] )->name("product");


// logged in
Route::group(["middleware" => "is.logged"], function(){
    Route::get("profile", [UserDashboard::class, "profile"])->name("profile");
    Route::post("billing_address", [UserDashboard::class, "store_billing_address"])->name("store_billing_address");
    Route::post("billing_address/delete", [UserDashboard::class, "destroy_billing_address"])->name("delete_billing_address");
    Route::get("cart", [CartController::class, "index"])->name("cart_items");
    Route::post("cart/checkout", [CartController::class, "checkout"])->name("send_to_check_out");
    Route::post("order/create", [OrderController::class, "store"])->name("store_order");
    Route::post("cart/delete", [CartController::class, "destroy"])->name("delete_cart");
});

// admin
Route::group(["middleware" => "is.admin"], function(){

    Route::get("orders", [CartController::class, "requests"])->name("orders");

    Route::get("brand/create", [BrandController::class, "create"])->name("brand_form");
    Route::post("brand/create", [BrandController::class, "store"])->name("brand_store");
    Route::post("brand/delete", [BrandController::class, "destroy"])->name("delete_brand");


    Route::get("category/create", [CategoryController::class, "create"])->name("category_form");
    Route::post("category/create", [CategoryController::class, "store"])->name("category_store");
    Route::post("category/delete", [CategoryController::class, "destroy"])->name("delete_category");

    Route::get("color/create", [ColorController::class, "create"])->name("color_form");
    Route::post("color/create", [ColorController::class, "store"])->name("color_store");
    Route::post("color/delete", [ColorController::class, "destroy"])->name("delete_color");

    Route::get("lens/create", [LensController::class, "create"])->name("lens_form");
    Route::post("lens/create", [LensController::class, "store"])->name("lens_store");
    Route::post("lens/delete", [LensController::class, "destroy"])->name("delete_lens");

    Route::get("size/create", [SizeController::class, "create"])->name("size_form");
    Route::post("size/create", [SizeController::class, "store"])->name("size_store");
    Route::post("size/delete", [SizeController::class, "destroy"])->name("delete_size");

    Route::get("subcategory/create", [SubcategoryController::class, "create"])->name("subcategory_form");
    Route::post("subcategory/create", [SubcategoryController::class, "store"])->name("subcategory_store");
    Route::post("subcategory/delete", [SubcategoryController::class, "destroy"])->name("delete_subcategory");

    Route::get("product/create", [ProductController::class, "create"])->name("product_form");
    Route::post("product/create", [ProductController::class, "store"])->name("product_store");
    Route::post("product/delete", [ProductController::class, "destroy"])->name("delete_product");

    Route::get("site_config/create", [SiteConfigController::class, "create"])->name("site_config_form");
    Route::post("site_config/edit/shipping", [SiteConfigController::class, "edit_shipping"])->name("edit_shipping_cost");
});
