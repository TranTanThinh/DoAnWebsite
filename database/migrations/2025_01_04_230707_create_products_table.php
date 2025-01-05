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
            $table->id('productId'); // Khóa chính
            $table->unsignedBigInteger('categoryId'); // ID danh mục
            $table->string('name'); // Tên sản phẩm
            $table->string('image'); // Đường dẫn ảnh
            $table->text('description')->nullable(); // Mô tả sản phẩm (có thể rỗng)
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->string('slug')->unique(); // Slug duy nhất
            $table->timestamps(); // created_at và updated_at
            $table->softDeletes(); // deleted_at (dùng soft delete)
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
