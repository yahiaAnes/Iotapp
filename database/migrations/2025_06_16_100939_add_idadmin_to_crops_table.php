<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('crops', function (Blueprint $table) {
        $table->unsignedBigInteger('idadmin')->nullable()->after('status'); // أو في أي موضع مناسب
    });
}

public function down()
{
    Schema::table('crops', function (Blueprint $table) {
        $table->dropColumn('idadmin');
    });
}
};
