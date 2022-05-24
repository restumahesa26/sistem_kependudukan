<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalKeluargas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keluargas', function (Blueprint $table) {
            $table->date('tanggal_pendatang')->nullable();
            $table->date('tanggal_miskin')->nullable();
            $table->date('tanggal_pindah')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keluargas', function (Blueprint $table) {
            $table->dropColumn('tanggal_pendatang');
            $table->dropColumn('tanggal_miskin');
            $table->dropColumn('tanggal_pindah');
        });
    }
}
