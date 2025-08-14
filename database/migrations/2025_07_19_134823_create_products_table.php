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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('category')->default('molen');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * menhapus jika dirollback the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
