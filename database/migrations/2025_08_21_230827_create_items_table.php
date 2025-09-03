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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // مفتاح أساسي
            $table->string('name'); // اسم المنتج
            $table->decimal('price', 10, 2); // سعر المنتج (رقم موجب)
            $table->text('description'); // وصف المنتج
            $table->timestamps(); // created_at + updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
