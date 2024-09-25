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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('fullname');  // Full name of the sender
            $table->string('email');  // Email of the sender
            $table->string('telephone')->nullable();  // Telephone number of the sender (nullable)
            $table->text('body');  // The message body
            $table->boolean('is_read')->default(false);  // Whether the message has been read (default to false)
            $table->timestamps();  // Automatically adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
