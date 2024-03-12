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
        Schema::create('about_us_contents', function (Blueprint $table) {
            $table->id();
            $table->string('banner_image')->nullable();
            $table->string('header1_title')->nullable();
            $table->json('header1_images')->nullable();
            $table->string('header2_title')->nullable();
            $table->longText('header2_description')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('employee_image')->nullable();
            $table->string('employee_experience')->nullable();
            $table->longText('about_employee')->nullable();
            $table->string('bottom1_title')->nullable();
            $table->longText('bottom1_description')->nullable();
            $table->json('bottom_logos')->nullable();
            $table->string('bottom2_title')->nullable();
            $table->string('bottom2_subtitle')->nullable();
            $table->json('bottom2_images')->nullable();
            $table->json('bottom2_image_title')->nullable();
            $table->json('bottom2_image_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_contents');
    }
};
