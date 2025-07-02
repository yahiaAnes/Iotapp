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
        Schema::create('crops', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('farm_id')->constrained('farms')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->date('planting_date');
            $table->date('harvest_date')->nullable();
            $table->text('fertilizers_used')->nullable();
            $table->boolean('isBlockchain')->default(false);
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected', 'stored'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crops');
    }
};
