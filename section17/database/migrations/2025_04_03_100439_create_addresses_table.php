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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động.
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Tạo khóa ngoại, nếu người dùng bị xóa thì các địa chỉ liên quan cũng bị xóa.
            $table->string('country');
            $table->timestamps(); // Tạo cột created_at và updated_at.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses'); // Xóa bảng addresses khi rollback migration.
    }
};
