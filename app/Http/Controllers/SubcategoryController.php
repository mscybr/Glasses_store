<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Category::latest());
        // foreach (Subcategory::latest()->get() as $subcate) {
        //     echo json_encode($subcate->category)."\n";
        // }
        // dd();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("en.admin.create_subcategory", ["categories"=>  Category::latest()->get(), "subcategories" => Subcategory::latest()->get() ]);
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
        $validation = $request->validate([
            "category_id" => "required|exists:categories,id",
            "subcategoryName" =>"required"
        ]);

        if($validation){
            Subcategory::create($validation);
            // dd("susce");
            return $this->create();
        }else{
             return redirect()->back()->withErrors($validation)->withInput();
        }

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
            "item_id" => "exists:Subcategories,id"
        ]);
        $id = $request->item_id;
        Subcategory::destroy($id);
        return redirect()->back();
    }
}
