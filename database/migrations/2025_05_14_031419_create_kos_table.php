<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('lokasi');
            $table->string('kategori')->nullable(); // Putra, Putri, Campur
            $table->string('periode')->nullable();  // Bulanan, Tahunan
            $table->integer('harga')->nullable();
            $table->text('deskripsi')->nullable(); // Tambahkan kolom deskripsi
            $table->string('fasilitas')->nullable(); // Tambahkan kolom fasilitas (bisa berupa JSON atau teks terpisah)
            $table->string('gambar')->nullable(); // Tambahkan kolom untuk menyimpan nama file gambar
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
        Schema::dropIfExists('kos');
    }
}
