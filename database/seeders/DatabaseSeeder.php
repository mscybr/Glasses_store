<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        // \App\Models\Subcategory::factory(10)->create();
        \App\Models\Color::factory(10)->create();
        \App\Models\Size::factory(10)->create();
        // \App\Models\Product::factory(10)->create();

        // \App\Models\Product::factory()->create([
        //     "ProductName"=>"Test Product",
        //     "Description" =>"Test Desc",
        //     "CategoryId" => 1,
        //     "BrandId" => 1,
        //     "Sale" => 0,
        //     "SizeId" => 1,
        //     "ColorId" => 1,
        //     "Price" => 10,
        //     "LensesIds" => ""
        // ]);
    }
}
