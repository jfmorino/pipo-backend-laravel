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
        Schema::create('size_types', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('name');  // Name of the size type (e.g., "Shirt Size", "Shoe Size")
            $table->timestamps();  // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('size_types');
    }
};
