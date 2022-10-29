<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();

            $table->string('jadwal_tempat')->nullable();
            $table->string('jadwal_keterangan')->nullable();
            $table->dateTime('jadwal_waktu')->nullable();

            $table->unsignedBigInteger('eskul_id')->nullable();

            $table->foreign('eskul_id')->references('id')->on('eskul');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
