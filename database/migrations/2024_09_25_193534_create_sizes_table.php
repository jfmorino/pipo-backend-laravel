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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->unsignedBigInteger('size_type_id');  // Foreign key for Size Type
            $table->string('value');  // Size value (e.g., "Small", "Medium", "10")
            $table->timestamps();  // Automatically adds created_at and updated_at

            // Foreign key constraint
            $table->foreign('size_type_id')->references('id')->on('size_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
