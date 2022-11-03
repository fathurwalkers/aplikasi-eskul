<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();

            $table->dateTime('absen_status')->nullable();
            $table->string('absen_waktu')->nullable();
            $table->text('absen_tanggal')->nullable();

            $table->unsignedBigInteger('eskul_id')->nullable();
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('jadwal_id')->nullable();

            $table->foreign('eskul_id')->references('id')->on('eskul');
            $table->foreign('siswa_id')->references('id')->on('siswa');
            $table->foreign('jadwal_id')->references('id')->on('jadwal');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absen');
    }
}
