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

            $table->string('absen_status')->nullable();
            $table->dateTime('absen_waktu')->nullable();
            $table->dateTime('absen_tanggal')->nullable();

            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('jadwal_id')->nullable();

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
