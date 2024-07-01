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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();
            $table->string('offer_text')->nullable();
            $table->string('display_offer')->default(true);
            $table->string('top_text');
            $table->string('header_image');
            $table->string('header_image_url');
            $table->string('ads_image_1');
            $table->string('ads_image_1_url');
            $table->string('ads_image_2');
            $table->string('ads_image_2_url');
            $table->string('bottom_title');
            $table->longText('bottom_description');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
