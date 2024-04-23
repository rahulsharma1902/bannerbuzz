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
        Schema::create('custom_designs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('userId')->nullable();
            $table->string('customerId')->nullable();
            $table->longtext('templateDataFront')->nullable();
            $table->longtext('templateDataBack')->nullable();
            $table->string('productId')->nullable();
            $table->string('canvasWidth')->nullable();
            $table->string('canvasHeight')->nullable();
            $table->string('finalPrice')->nullable();
            $table->integer('sizeId')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_designs');
    }
};
