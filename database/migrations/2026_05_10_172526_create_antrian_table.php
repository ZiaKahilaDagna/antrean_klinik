<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_antrian', 20)->unique();
            $table->foreignId('pasien_id')->refrences('pasien_id')->on('pasien');
            $table->foreignId('dokter_id')->refrences('dokter_id')->on('dokter');
            $table->foreignId('jadwal_id')->refrences('jadwal_id')->on('jadwal');
            $table->text('keluhan')->nullable();
            $table->enum('status', ['menunggu', 'dipanggil;', 'selesai', 'batal'])->default('menunggu');
            $table->datetime('waktu_daftar');
            $table->datetime('waktu_panggil')->nullable();
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
        Schema::dropIfExists('antrian');
    }
}
