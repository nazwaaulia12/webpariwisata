<?php

namespace App\Http\Controllers;

use App\Models\Daftar_Paket;
use App\Models\Paket_Wisata;
use Illuminate\Http\Request;
use PDF;

class PemilikDaftarPaketController extends Controller
{
    public function index()
        { 
            $daftarpaket = Daftar_Paket::all();
            return view('pemilik-daftarpaket.index', [ 
                'daftarpaket' => $daftarpaket
            ]);
        }

    public function exportpdf2(){
            $daftarpaket = Daftar_Paket::all();
            view()->share('daftarpaket', $daftarpaket);
            $pdf = PDF::loadview('pemilik-daftarpaket-pdf');
            return $pdf->download('DataDaftarPaket.pdf');
        }
}
