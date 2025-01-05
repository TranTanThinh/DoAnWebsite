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
            $table->id('productId');
            $table->unsignedBigInteger('categoryId');
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes(); // Để hỗ trợ xóa mềm
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
