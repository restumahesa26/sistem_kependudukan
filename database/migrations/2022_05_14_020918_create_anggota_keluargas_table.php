<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota_keluargas', function (Blueprint $table) {
            $table->string('nik')->unique()->primary();
            $table->string('nama');
            $table->string('no_kk');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->enum('status_perkawinan',['Kawin','Belum Kawin','Cerai Hidup','Cerai Mati'])->nullable();
            $table->enum('status_hubungan', ['Suami','Istri','Menantu','Anak','Cucu','Orang Tua','Mertua','Famili Lain','Pembantu'])->nullable();
            $table->integer('urutan')->nullable();
            $table->foreign('no_kk')->references('no_kk')->on('keluargas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota_keluargas');
    }
}
