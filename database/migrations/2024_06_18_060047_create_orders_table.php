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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number')->unique();
            $table->string('confirmation_email')->nullable();
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->json('user_order_data')->nullable();
            $table->text('customization_details')->nullable(); 
            $table->decimal('product_price',10,2);
            $table->decimal('shipping_charges',10,2)->nullable();
            $table->decimal('additional_charges',10,2)->nullable();
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method')->nullable();
            $table->string('currency')->default('usd'); 
            $table->json('basket_data')->nullable(); 
            $table->string('status')->default('pending'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
