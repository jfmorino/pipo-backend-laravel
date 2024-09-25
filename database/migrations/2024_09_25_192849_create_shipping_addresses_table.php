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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('user_id');  // Foreign key for User
            $table->string('address');  // Shipping address
            $table->string('city');  // City for shipping
            $table->string('state');  // State for shipping
            $table->string('zip_code');  // ZIP code for shipping
            $table->string('country');  // Country for shipping
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
