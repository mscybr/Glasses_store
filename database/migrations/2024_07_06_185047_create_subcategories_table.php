<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string("subcategoryName");
            $table->integer("category_id")->unsigned();
            $table->index("category_id");
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down( Blueprint $table)
    {
        Schema::dropIfExists('subcategories');
        $table->dropForeign('category_id');
        $table->dropIndex('category_id');
        $table->dropColumn('category_id');
    }
};
