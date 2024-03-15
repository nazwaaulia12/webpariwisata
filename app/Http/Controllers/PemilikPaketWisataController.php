<?php

namespace App\Http\Controllers;

use App\Models\Paket_Wisata;
use Illuminate\Http\Request;
use PDF;

class PemilikPaketWisataController extends Controller
{
    public function index(){
        $paketwisata = Paket_Wisata::all();
        return view('pemilik-paketwisata.index', [ 
        'paketwisata' => $paketwisata
        ]);
        } 
    public function exportpdf1(){
        $paketwisata = Paket_Wisata::all();
        view()->share('paketwisata', $paketwisata);
        $pdf = PDF::loadview('pemilik-paketwisata-pdf');
        return $pdf->download('DataPaketWisata.pdf');
    }
}
