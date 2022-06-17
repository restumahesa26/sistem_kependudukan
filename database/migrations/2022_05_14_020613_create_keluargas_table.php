<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->string('no_kk', 16)->unique()->primary();
            $table->string('alamat', 100);
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->enum('is_pendatang', [0,1])->default(0);
            $table->enum('is_miskin', [0,1])->default(0);
            $table->enum('is_pindah', [0,1])->default(0);
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
        Schema::dropIfExists('keluargas');
    }
}
