<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Paket extends Model
{
    use HasFactory;
    protected $table = 'daftar_paket'; 
    protected $fillable = [ 
        'nama_paket', 
        'id_paket_wisata', 
        'jumlah_peserta',
        'harga_paket'
    ];

    public function fpaketwisata(){
        return $this->belongsTo(Paket_Wisata::class, 'id_paket_wisata', 'id');
        } 

    
}
