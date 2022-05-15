<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTanggalKematianToPendudukMeninggalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penduduk_meninggals', function (Blueprint $table) {
            $table->date('tanggal_meninggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penduduk_meninggals', function (Blueprint $table) {
            $table->dropColumn('tanggal_meninggal');
        });
    }
}
