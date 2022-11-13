<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();

            $table->string('nilai_absen')->nullable();
            $table->string('nilai_prestasi')->nullable();
            $table->string('nilai_total')->nullable();
            $table->string('nilai_grade')->nullable();

            $table->unsignedBigInteger('siswa_id')->nullable();

            $table->foreign('siswa_id')->references('id')->on('siswa');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
