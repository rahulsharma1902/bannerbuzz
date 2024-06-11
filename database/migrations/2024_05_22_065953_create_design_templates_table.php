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

        Schema::create('design_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('dimension')->nullable();
            $table->string('size_type')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('temporary_id')->nullable();
            $table->string('qty')->nullable();
            $table->longText('image')->nullable();
            $table->longText('variations')->nullable();
            $table->longText('template_data')->nullable();
            $table->string('design_method')->default('template')->nullable();  //tempalte  artwork ArtworkLater hireDesigner
            $table->tinyInteger('status')->default(0)->nullable();
            $table->timestamps();
        
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('design_templates');
    }
};
