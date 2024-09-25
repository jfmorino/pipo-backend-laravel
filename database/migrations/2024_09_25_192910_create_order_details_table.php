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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id');  // Foreign key for User
            $table->decimal('total', 10, 2);  // Total amount for the order
            $table->unsignedBigInteger('shipping_address_id');  // Foreign key for Shipping Address
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shipping_address_id')->references('id')->on('shipping_addresses')->onDelete('cascade'); // Assuming you have a shipping_addresses table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
