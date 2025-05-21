<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';

    // Jika kamu ingin menggunakan mass assignment:
    protected $fillable = [
        'nomor_polisi',
        'nomor_rangka',
        'nomor_mesin',
        'merk',
        'tipe',
        'jenis',
        'warna',
        'tahun',
        'bahan_bakar',
        'isi_silinder',
        'nama_pemilik',
        'alamat_pemilik',
        'tanggal_pembelian',
        'pajak_berlaku_sampai',
        'status',
    ];
}
