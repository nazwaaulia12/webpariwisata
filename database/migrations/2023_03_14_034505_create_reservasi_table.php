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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_daftar_paket');
            $table->datetime('tanggal_reservasi_wisata');
            $table->integer('harga');
            $table->integer('jumlah_peserta');
            $table->decimal('diskon', 10, 0)->nullable();
            $table->float('nilai_diskon')->nullable();
            $table->BigInteger('total_bayar');
            $table->text('file_bukti_tf')->nullable();
            $table->enum('status_reservasi_wisata', ['pesan', 'dibayar', 'selesai']);
            $table->timestamps();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_daftar_paket')->references('id')->on('daftar_paket')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
