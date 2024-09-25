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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('order_detail_id');  // Foreign key for Order Details
            $table->decimal('amount', 10, 2);  // Amount of the payment
            $table->string('provider');  // Payment provider (e.g., "PayPal", "Stripe")
            $table->string('status');  // Status of the payment (e.g., "completed", "pending", "failed")
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraint
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
