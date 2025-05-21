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
    Schema::create('kendaraans', function (Blueprint $table) {
    $table->id();
    $table->string('nomor_polisi')->nullable();
    $table->string('nomor_rangka')->nullable();
    $table->string('nomor_mesin')->nullable();
    $table->string('merk');
    $table->string('tipe')->nullable();
    $table->enum('jenis', ['Mobil', 'Motor', 'Truk']);
    $table->string('warna')->nullable();
    $table->year('tahun');
    $table->string('bahan_bakar')->nullable();
    $table->integer('isi_silinder')->nullable();
    $table->string('nama_pemilik')->nullable();
    $table->string('alamat_pemilik')->nullable();
    $table->date('tanggal_pembelian')->nullable();
    $table->date('pajak_berlaku_sampai')->nullable();
    $table->enum('status', ['Aktif', 'Dijual', 'Rusak'])->default('Aktif');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
