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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');  // Discount name
            $table->text('desc')->nullable();  // Description, nullable
            $table->decimal('discount_percent', 5, 2);  // Discount percentage, max 5 digits, 2 decimals
            $table->boolean('active')->default(true);  // Active status, default is true
            $table->timestamps();  // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
