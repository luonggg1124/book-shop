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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price',10,2)->default(0);
            $table->decimal('promotional_price',10,2)->default(0);
            $table->string('publisher');
            $table->string('description')->nullable(true);
            $table->integer('quantity');
            $table->integer('view')->default(0);
            $table->foreignId('category_id')->constrained('categories');
            $table->string('image');
            $table->string('status')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
