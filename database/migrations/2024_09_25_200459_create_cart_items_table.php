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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('product_id');  // Foreign key for Product
            $table->unsignedBigInteger('user_id');  // Foreign key for User
            $table->integer('quantity')->default(1);  // Quantity of the product in the cart
            $table->timestamp('order_added')->useCurrent();  // Timestamp for when the item was added to the cart
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
