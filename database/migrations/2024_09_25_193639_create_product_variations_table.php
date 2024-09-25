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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('product_id');  // Foreign key for Product
            $table->unsignedBigInteger('size_id');  // Foreign key for Size
            $table->unsignedBigInteger('color_id');  // Foreign key for Color
            $table->integer('quantity');  // Quantity of the product variation
            $table->decimal('price', 10, 2);  // Price of the product variation
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');  // Assuming a sizes table exists
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');  // Assuming a colors table exists
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
