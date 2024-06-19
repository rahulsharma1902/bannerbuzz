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
        Schema::create('user_order_designs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('accessorie_id')->nullable();
            $table->string('product_type')->nullable();       // customizable or not
            $table->unsignedBigInteger('design_id')->nullable();
            $table->string('design_method')->default('template')->nullable();   //tempalte  artwork ArtworkLater hireDesigner
            $table->longText('images')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('dimension')->nullable();
            $table->string('size_type')->nullable();
            $table->longText('variations')->nullable();
            $table->longText('template_data')->nullable();
            $table->string('qty')->nullable();
            $table->longText('additionalInfo')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_order_designs');
    }
};
