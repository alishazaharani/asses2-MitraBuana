<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('barangs', function (Blueprint $table) {
        $table->unsignedBigInteger('kategori_id')->nullable()->after('harga');
    });
}

public function down()
{
    Schema::table('barangs', function (Blueprint $table) {
        $table->dropColumn('kategori_id');
    });
}

};
