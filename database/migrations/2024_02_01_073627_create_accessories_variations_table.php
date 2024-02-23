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
            $table->string('var_slug');
            $table->string('accessories_id')->nullable();
            $table->string('entity_id')->nullable();
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
