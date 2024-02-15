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
        Schema::create('accessories_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('accessories_id');
            $table->string('size_type')->nullable();
            $table->text('size_value')->nullable();
            $table->string('size_unit')->default('null');
            $table->text('price')->nullable();
            $table->text('quantity')->nullable();
            $table->integer('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessories_sizes');
    }
};
