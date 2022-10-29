<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembinasTable extends Migration
{
    public function up()
    {
        Schema::create('pembina', function (Blueprint $table) {
            $table->id();

            $table->string('pembina_nama')->nullable();
            $table->string('pembina_nip')->nullable();
            $table->string('pembina_jeniskelamin')->nullable();
            $table->string('pembina_alamat')->nullable();
            $table->string('pembina_telepon')->nullable();
            $table->string('pembina_foto')->nullable();
            $table->string('pembina_status')->nullable();
            $table->string('pembina_jabatan_organik')->nullable();
            $table->string('pembina_jabatan_kegiatan')->nullable();
            $table->string('pembina_kode');

            $table->unsignedBigInteger('login_id')->nullable();
            $table->unsignedBigInteger('eskul_id')->nullable();

            $table->foreign('login_id')->references('id')->on('login');
            $table->foreign('eskul_id')->references('id')->on('eskul');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembina');
    }
}
