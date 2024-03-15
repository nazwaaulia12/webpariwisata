<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket')->unique();
            $table->unsignedBigInteger('id_paket_wisata');
            $table->integer('jumlah_peserta');
            $table->BigInteger('harga_paket')->default(true);
            $table->timestamps();
            $table->foreign('id_paket_wisata')->references('id')->on('paket_wisata')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_paket');
    }
};
