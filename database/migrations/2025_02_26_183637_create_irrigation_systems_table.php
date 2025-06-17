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
        Schema::create('irrigation_systems', function (Blueprint $table) {
            $table->id('id');
            $table->foreignid('farm_id')->constrained('farms')->onDelete('cascade');
            $table->enum('mode', ['manual', 'automatic'])->default('automatic');
            $table->boolean('status')->default(false);
            $table->timestamp('last_run')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigation_systems');
    }
};
