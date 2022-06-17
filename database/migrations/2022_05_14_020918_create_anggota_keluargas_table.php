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
            $table->string('nik', 16)->unique()->primary();
            $table->string('nama', 100);
            $table->string('no_kk', 16);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('agama', 20);
            $table->string('pendidikan', 50);
            $table->string('pekerjaan', 50);
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
