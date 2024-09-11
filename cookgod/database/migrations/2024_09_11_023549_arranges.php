<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arranges', function (Blueprint $table) {
            $table->id('arrange_id'); // Primary key with auto increment
            $table->unsignedBigInteger('cooking_id'); // Ensure this matches the type of the primary key in 'cooks'
            $table->string('name', 255); // Arrange name
            $table->string('description', 255)->nullable(); // Optional description
            $table->string('image_path', 255)->nullable(); // Optional image path
            $table->integer('impression')->nullable(); // Impression count
            $table->timestamps(); // created_at and updated_at
            
            // Define foreign key constraint
            $table->foreign('cooking_id')->references('cooking_id')->on('cooks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arranges');
    }
};
