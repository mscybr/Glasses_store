<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "category_id",
        "subcategory_id",
        "brand_id",
        "sale",
        "sizes",
        "colors",
        "price",
        "lenses",
        "images",
        "stock"
    ];

    public function scopeFilter( $query, array $filters ){
        if( ($filters["Stock"] ?? false) && $filters["Stock"] == "1" ) $query->where("stock", ">", 0 );
        if( $filters["Category"] ?? false) $query->where("category_id", "=", request("Category"));
        if( $filters["Subcategory"] ?? false) $query->Where("subcategory_id", "=", request("Subcategory"));
        if( $filters["Brand"] ?? false) $query->where(["brand_id" => request("Brand")]);
        if( $filters["Sale"] ?? false) $query->where("sale", ">", 0);
        if( $filters["Size"] ?? false){
            $raw_array = [];
            $query->Where( function( Builder $query ){
                $counter = 0;
                foreach (request("Size") as $item) {
                    // (',' || column_name || ',') LIKE '%,value,%'
                    // $query->orWhereRaw("FIND_IN_SET( ".$size.", sizes )");
                    if( $counter == 0 ){
                        $raw_array[] = ["(',' || sizes || ',')", "LIKE", "'%,$item,%"];
                        $query->WhereRaw("(',' || sizes || ',') LIKE '%,$item,%'");
                    }else{
                    //     $raw_array[] = "(',' || sizes || ',') LIKE '%,$item,%'";
                        $query->orWhereRaw("(',' || sizes || ',') LIKE '%,$item,%'");
                    }
                    $counter++;
                }
            });
            // ddd($query);
            // $query->Where($raw_array);
        }
        if( $filters["Color"] ?? false){
            $query->Where( function( Builder $query ){
                $counter = 0;
                foreach (request("Color") as $item) {
                    // (',' || column_name || ',') LIKE '%,value,%'
                    // $query->orWhereRaw("FIND_IN_SET( ".$size.", sizes )");
                    if( $counter == 0 ){
                        $query->WhereRaw("(',' || colors || ',') LIKE '%,$item,%'");
                    }else{
                        $query->orWhereRaw("(',' || colors || ',') LIKE '%,$item,%'");
                    }
                    $counter++;
                }
            });
        }
        if( $filters["Lens"] ?? false){
            $query->Where( function( Builder $query ){
                $counter = 0;
                foreach (request("Lens") as $item) {
                    // (',' || column_name || ',') LIKE '%,value,%'
                    // $query->orWhereRaw("FIND_IN_SET( ".$size.", sizes )");
                    if( $counter == 0 ){
                        $query->WhereRaw("(',' || lenses || ',') LIKE '%,$item,%'");
                    }else{
                        $query->orWhereRaw("(',' || lenses || ',') LIKE '%,$item,%'");
                    }
                    $counter++;
                }
            });
        }
        if( $filters["MinPrice"] ?? false) $query->where("price", ">=", request("MinPrice"));
        if( $filters["MaxPrice"] ?? false) $query->where("price", "<=", request("MaxPrice"));
        if( $filters["Search"] ?? false) {
            $query->where("name", "LIKE", "%". request("Search") . "%")
                ->orWhere("description", "LIKE", "%". request("Search") ."&");
        }
    }

    /**
     * Get the category.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    /**
     * Get the category.
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
