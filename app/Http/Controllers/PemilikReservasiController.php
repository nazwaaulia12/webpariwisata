<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use App\Models\pelanggan;
use App\Models\Daftar_Paket;
use PDF;
use Illuminate\Http\Request;

class PemilikReservasiController extends Controller
{
    public function index(){
        $reservasi = reservasi::all();
        return view('pemilik-reservasi.index', [ 
        'reservasi' => $reservasi
        ]);
        }
    
    public function exportpdf(){
        $reservasi = reservasi::all();
        view()->share('reservasi', $reservasi);
        $pdf = PDF::loadview('pemilik-reservasi-pdf');
        return $pdf->download('DataReservasi.pdf');
    }
}
