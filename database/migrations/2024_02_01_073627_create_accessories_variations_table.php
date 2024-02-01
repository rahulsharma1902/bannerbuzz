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
        Schema::create('accessories_variations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('accessories_id')->nullable();
            $table->string('entity_id')->nullable();
            $table->text('value')->nullable();
            $table->text('price')->nullable();
            $table->text('quantity')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories_variations');
    }
};
