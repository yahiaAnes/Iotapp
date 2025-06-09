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
        Schema::create('blockchain_requests', function (Blueprint $table) {
    $table->id();
    $table->foreignId('farmer_id')->constrained('users')->onDelete('cascade');
    $table->text('data'); // أو يمكن أن يكون JSON حسب الحاجة
    $table->boolean('is_saved_to_blockchain')->default(false);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blockchain_requests');
    }
};
