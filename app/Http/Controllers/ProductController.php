<?php

namespace App\Http\Controllers;

use App\Models\Lens;
use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $product_id)
    {
        $request["product_id"] = $product_id;
        $validation = $request->validate(["product_id"=>"numeric|exists:products,id"]);
        if( $validation == false ) return redirect()->route("shop");

        $product = Product::find($product_id);
        // $product = Product::where("id", $product_id);
        $related_query = Product::latest();
        $related_prods = $related_query->where("category_id", "=", $product->category_id )->Where("id", "!=", $product_id)->get();
        // dd();
        $related_query = $related_prods->random( $related_prods->count() >= 5 ? 5 : $related_prods->count());
        // ddd($related_query);
        return view("en.store.product", ["product" => $product, "related" => $related_query, "reviews" => Review::latest()->Where("product_id", "=", $product_id)->get()]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // delete products that have their subcate removed
        $products = Product::latest()->filter(request(["Stock", "Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]))->get();
        foreach ($products as $product ) {
            if( isset($product->subcategory_id) && $product->subcategory == null ) $product->delete();
            if(  $product->category == null ) $product->delete();
        }
        $products = Product::latest()->filter(request(["Stock", "Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]));
        // ddd(Product::latest()->filter(request(["Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]))->get());
        return view(
            "en.store.shop",
            [
                "products" => $products->paginate(12),
                "categories" =>  Category::latest()->get(),
                "subcategories" =>  Subcategory::latest()->get(),
                "brands" =>  Brand::latest()->get(),
                "lenses" =>  Lens::latest()->get(),
                "colors" =>  Color::latest()->get(),
                "sizes" =>  Size::latest()->get(),
            ]
        );
        // ddd(1);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // delete products that have their subcate removed
        $products = Product::latest()->filter(request(["Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]))->get();
        foreach ($products as $product ) {
            if( isset($product->subcategory_id) && $product->subcategory == null ) $product->delete();
            if(  $product->category == null ) $product->delete();
          
        }
        $products = Product::latest()->filter(request(["Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]));
        
        return view("en.admin.create_product", [
            "categories" =>  Category::latest()->get(),
            "subcategories" =>  Subcategory::latest()->get(),
            "brands" =>  Brand::latest()->get(),
            "lenses" =>  Lens::latest()->get(),
            "colors" =>  Color::latest()->get(),
            "sizes" =>  Size::latest()->get(),
            "products"=>$products->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view("product.create");
        $validation_array = [
            "name" =>"required",
            "description" =>"required",
            "sale" =>"numeric",
            "price" =>"required|numeric",
            "category_id" =>"required|numeric|exists:categories,id",
            "subcategory_id" =>"numeric|exists:subcategories,id",
            "brand_id" =>"required|numeric|exists:brands,id",
            "color" => "required",
            "size" => "required",
            "color.*" => "required",
            "size.*" => "required",
            "lens.*" => "required",
        ];
        // images
        $files = [];
        foreach($request->file('image') as $file){
            // do uploading like what you are doing in your single file.
            // $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_BASENAME);
            $temp = $file->store('public/images');
            $_array = explode("/", $temp);
            $file_name = $_array[ sizeof($_array) -1 ];
            $files [] = $file_name;
        }
        $validation = $request->validate($validation_array);
        $validation["images"] = implode(",", $files);
        if(isset($validation["color"])) $validation["colors"] = implode(",", $validation["color"]);
        if(isset($validation["size"])) $validation["sizes"] = implode(",", $validation["size"]);
        if(isset($validation["lens"])) $validation["lenses"] = implode(",", $validation["lens"]);

        // dd($validation);
        if($validation){
            Product::create($validation);
            return $this->create();
        }else{
             return redirect()->back()->withErrors($validation)->withInput();
        }
    }

    public function edit_inventory (Request $request)
    {
        $request->validate([
            "stock" => "required"
        ]);
        foreach( $request->stock as $key => $amount ){
            $product = Product::find( $key);
            // dd($product);
            $product->update(["stock"=>$amount]);
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function inventory(Request $request)
    {
        $products = Product::latest()->filter(request(["Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]))->get();
        foreach ($products as $product ) {
            if( isset($product->subcategory_id) && $product->subcategory == null ) $product->delete();
            if(  $product->category == null ) $product->delete();
        }
        $products = Product::latest()->filter(request(["Category", "Subcategory", "Brand", "Sale", "Size", "Color", "MinPrice", "MaxPrice", "Search"]));

        return view("en.admin.inventory", ["products"=>$products->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    public function remove_fav( Request $request )
    {
        $validation = $request->validate([
            "product" => "exists:products,id"
        ]);
        $favs = (array)json_decode($request->cookie('favs'));
        unset($favs[$validation["product"]]);

        $response = new Response('Success');
        $response->withCookie(cookie('favs', json_encode($favs)));
        return $response;
    }

    public function add_to_fav( Request $request )
    {
        $validation = $request->validate([
            "product" => "exists:products,id"
        ]);
        $favs = (array)json_decode($request->cookie('favs'));
        $favs[$validation["product"]] = 1;

        $response = new Response('Success');
        $response->withCookie(cookie('favs', json_encode($favs)));
        return $response;
    }

    public function favs(Request $request)
    {
        $products = [];
        if($request->cookie('favs') !== null){

            foreach ( json_decode($request->cookie('favs')) as $product_id => $value) {
                $products[] = Product::where("id", $product_id)->get()[0];
            }
        }
        // dd($products);
        return view("en.store.favs", ["products" => $products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validation = $request->validate([
            "item_id" => "exists:Products,id"
        ]);
        $id = $request->item_id;
        Product::destroy($id);
        return redirect()->back();
    }
}
