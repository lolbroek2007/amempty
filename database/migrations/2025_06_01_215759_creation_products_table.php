<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("inventory", function(Blueprint $table){
            $table->id();
            $table->string("Product_Name");
            $table->text("Product_Description")->nullable();
            $table->integer("Product_Quantity")->default(0);
            $table->decimal("Product_Price", 10, 2)->default(0.00)->nullable();
            $table->foreignId("Category_ID")->constrained("Categories")->onDelete("cascade");
            $table->boolean('Product_Inactive')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
