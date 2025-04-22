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
            $table->string('name'); // Tên sản phẩm
            $table->string('image')->nullable(); // Tên sản phẩm
            $table->double('price'); // Giá sản phẩm
            $table->string('short_description'); // Mô tả ngắn
            $table->integer('qty')->default(0); // Số lượng, mặc định 0
            $table->string('sku'); // Mã sản phẩm (nếu có)
            $table->text('description'); // ✅ Mô tả dài - dùng để lưu dữ liệu HTML của TinyMCE
            $table->timestamps(); // created_at, updated_at
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
