<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('deskripsi');
            $table->string('foto')->nullable();
            $table->integer('harga');
            $table->enum('status', ['Tersedia', 'Terisi']);
            $table->enum('tipe', ['Putra', 'Putri', 'Campur']);
            $table->timestamps();
            $table->foreignId('pemilik_kost_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kosts');
    }
};
