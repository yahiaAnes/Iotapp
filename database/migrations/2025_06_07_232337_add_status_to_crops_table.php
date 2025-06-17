<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

//     public function up()
// {
//     Schema::table('crops', function (Blueprint $table) {
//         $table->string('status')->default('pending')->after('id');
//     });
// }


// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
public function up()
{
    Schema::table('crops', function (Blueprint $table) {
        $table->enum('status', ['draft', 'pending', 'approved', 'rejected', 'stored'])
              ->default('draft')
              ->after('id');          // يمكن حذف after() إن لم يهم الترتيب
    });
}

public function down()
{
    Schema::table('crops', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// public function up()
// {
//     Schema::table('crops', function (Blueprint $table) {
//         $table->string('status')->default('pending');
//     });
// }

// public function down()
// {
//     Schema::table('crops', function (Blueprint $table) {
//         $table->dropColumn('status');
//     });
// }

};
