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
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');
            // $table->string('sku');
            $table->longText('description');
            $table->integer('stock_alert')->default(10);
            $table->boolean('active')->default(true);
            $table->boolean('has_colors')->default(0)->nullable();
            $table->boolean('same_price')->default(1)->nullable();
            $table->string('gender')->default('mix');
            $table->foreignId('size_type_id')->constrained('size_types');
            $table->integer('discount_percentage')->default(0)->nullable();
            $table->boolean('is_discount_active')->default(false);
            $table->unsignedBigInteger('category_id');  // Foreign key for Category (one-to-many)
            $table->unsignedBigInteger('discount_id')->nullable();  // Foreign key for Discount, nullable
            // Automatically adds created_at and updated_at

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
