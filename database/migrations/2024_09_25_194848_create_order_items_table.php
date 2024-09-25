<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('order_detail_id');  // Foreign key for Order Details
            $table->unsignedBigInteger('product_variation_id');  // Foreign key for Product Variation
            $table->integer('quantity');  // Quantity of the product variation in the order
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraints
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
            $table->foreign('product_variation_id')->references('id')->on('product_variations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
