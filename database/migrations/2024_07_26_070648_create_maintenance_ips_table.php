<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenance_ips', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['on', 'off'])->default('off'); 
            $table->string('ip_address')->nullable(); 
            $table->timestamps();
        });

        // Update or insert default record for maintenance mode status with id 1
        DB::table('maintenance_ips')->updateOrInsert(
            ['id' => 1],
            [
                'status' => 'off',
                'ip_address' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_ips');
    }
};
