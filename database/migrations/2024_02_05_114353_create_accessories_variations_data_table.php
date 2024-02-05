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
        Schema::create('accessories_variations_data', function (Blueprint $table) {
            $table->id();
            $table->text('accessories_variation_id');
            $table->text('value')->nullable();
            $table->text('price')->nullable();
            $table->text('quantity')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories_variations_data');
    }
};
