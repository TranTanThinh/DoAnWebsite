<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->unsignedInteger('productId')->autoIncrement();
        $table->unsignedInteger('categoryId');
        $table->string('name');
        $table->string('image');
        $table->text('description');
        $table->decimal('price', 9, 2);
        $table->string('slug');
        $table->timestamps();
        $table->softDeletes();
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
