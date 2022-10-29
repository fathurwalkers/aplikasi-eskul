<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEskulsTable extends Migration
{
    public function up()
    {
        Schema::create('eskul', function (Blueprint $table) {
            $table->id();

            $table->string('eskul_nama')->nullable();
            $table->string('eskul_tahun')->nullable();
            $table->string('eskul_angkatan')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eskul');
    }
}
