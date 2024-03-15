<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi'; 
    protected $fillable = [ 
        'id_pelanggan', 
        'id_daftar_paket',
        'tanggal_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata'
    ];
 
    public function fpelanggan(){
        return $this->belongsTo(pelanggan::class, 'id_pelanggan', 'id');
    } 

    public function fdaftarpaket(){
        return $this->belongsTo(Daftar_Paket::class, 'id_daftar_paket', 'id');
    } 
}
