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
            $table->string('slug')->unique();
            $table->string('product_type_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('accessories_type_id')->nullable();
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->text('price')->nullable();
            $table->string('is_printed')->nullable();
            $table->text('quantity')->default('10000');
            $table->text('addtional_info')->nullable();
            $table->json('key_points')->nullable();
            $table->integer('status')->default(true);
            $table->timestamps();
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
