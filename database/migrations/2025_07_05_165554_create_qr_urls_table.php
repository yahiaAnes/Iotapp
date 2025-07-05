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
        Schema::create('qr_urls', function (Blueprint $table) {
            $table->id();
            $table->string('qrUrl')->nullable();
            $table->timestamps();
        });
        DB::table('qr_urls')->insert([
            'qrUrl' => 'http://localhost:8000/crop/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_urls');
    }
};
