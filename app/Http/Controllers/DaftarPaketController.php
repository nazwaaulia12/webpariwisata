<?php

namespace App\Http\Controllers;

use App\Models\Daftar_Paket;
use App\Models\Paket_Wisata;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    public function index()
        { 
            $daftarpaket = Daftar_Paket::all();
            return view('daftar_paket.index', [ 
                'daftarpaket' => $daftarpaket
            ]);
        }

        public function create(){ 
            return view( 
            'daftar_paket.create', [
            'paket_wisata' => Paket_Wisata::all()
            ]);
            } 
    
        public function store(Request $request)
            { 
            $request->validate([
            'nama_paket' => 'required|unique:daftar_paket,nama_paket', 
            'id_paket_wisata'=> 'required',
            'jumlah_peserta'=> 'required',
            'harga_paket'=> 'required'
            ]);
            $array = $request->only([
            'nama_paket', 
            'id_paket_wisata',
            'jumlah_peserta',
            'harga_paket'
            ]);
            Daftar_Paket::create($array);
            return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil menambah Daftar Paket Baru');
            }
        
        public function edit($id)
            { 
            $daftarpaket = Daftar_Paket::find($id);
            if (!$daftarpaket) return redirect()->route('daftar_paket.index')->with('error_message', 'Daftar Paket dengan id = '.$id.'tidak ditemukan');
            return view('daftar_paket.edit', [ 
            'daftarpaket' => $daftarpaket,
            'paket_wisata' => Paket_Wisata::all()
            ]);
            } 
        public function update(Request $request, $id)
            { 
            $request->validate([
            'nama_paket' => 'required', 
            'id_paket_wisata'=> 'required',
            'jumlah_peserta'=> 'required',
            'harga_paket'=> 'required'
            ]);
            $daftarpaket = Daftar_Paket::find($id);
            $daftarpaket->nama_paket = $request->nama_paket;
            $daftarpaket->id_paket_wisata = $request->id_paket_wisata;
            $daftarpaket->jumlah_peserta = $request->jumlah_peserta;
            $daftarpaket->harga_paket = $request->harga_paket;
            $daftarpaket->save();
            return redirect()->route('daftar_paket.index')->with('success_message', 'Berhasil mengubah Daftar Paket');
            }
            
        public function destroy(Request $request, $id)
            { 
            $daftarpaket = Daftar_Paket::find($id);
            if ($daftarpaket) $daftarpaket->delete();
            return redirect()->route('daftar_paket.index') 
            ->with('success_message', 'Berhasil menghapus Daftar Paket "' . $daftarpaket->daftarpaket . '!');
            }
}
