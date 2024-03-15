<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use App\Models\pelanggan;
use App\Models\Daftar_Paket;
use Illuminate\Http\Request;


class ReservasiController extends Controller
{
    public function index(){
        $reservasi = reservasi::all();
        return view('reservasi.index', [ 
        'reservasi' => $reservasi
        ]);
        } 

    public function create(){ 
        return view( 
        'reservasi.create', [ 
        'pelanggan' => pelanggan::all(),
        'daftarpaket' => Daftar_Paket::all() 
        ]);
        } 
    
    public function store(Request $request)
        { 
        $request->validate([
        'id_pelanggan'=> 'required', 
        'id_daftar_paket'=> 'required',
        'tanggal_reservasi_wisata'=> 'required',
        'harga'=> 'required',
        'jumlah_peserta'=> 'required',
        'diskon'=> 'required',
        'nilai_diskon'=> 'required',
        'total_bayar'=> 'required',
        'file_bukti_tf'=> 'required|image|file|max:2048',
        'status_reservasi_wisata'=> 'required'
        ]);
        $array = $request->only([
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
        ]);
        $array['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Bukti Transfer');
        $tambah = reservasi::create($array);
        if($tambah) $request->file('file_bukti_tf')->store('Bukti Transfer');
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menambah Daftar Reservasi Baru');
        }

    public function edit($id)
        { 
        $reservasi = reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')->with('error_message', 'pelanggan dengan id = '.$id.' tidak ditemukan');
        return view('reservasi.edit', [ 
        'reservasi' => $reservasi,
        'pelanggan' => pelanggan::all(),
        'daftarpaket' => Daftar_Paket::all()
        ]);
        } 

    public function update(Request $request, $id)
        { 
        $request->validate([
        'id_pelanggan'=> 'required', 
        'id_daftar_paket'=> 'required',
        'tanggal_reservasi_wisata'=> 'required',
        'harga'=> 'required',
        'jumlah_peserta'=> 'required',
        'diskon'=> 'required',
        'nilai_diskon'=> 'required',
        'total_bayar'=> 'required',
        'file_bukti_tf'=> $request->file('foto') != null ? 'image|file|max:2048' : '',
        'status_reservasi_wisata'=> 'required'
        ]);
        $reservasi = reservasi::find($id);
        $reservasi->id_pelanggan = $request->id_pelanggan;
        $reservasi->id_daftar_paket = $request->id_daftar_paket;
        $reservasi->tanggal_reservasi_wisata = $request->tanggal_reservasi_wisata;
        $reservasi->harga = $request->harga;
        $reservasi->jumlah_peserta = $request->jumlah_peserta;
        $reservasi->diskon = $request->diskon;
        $reservasi->nilai_diskon = $request->nilai_diskon;
        $reservasi->total_bayar = $request->total_bayar;
        if($request->file('file_bukti_tf') != null){
            unlink("storage/" . $reservasi->file_bukti_tf);
            $reservasi->file_bukti_tf = $request->file('file_bukti_tf')->store('Bukti Transfer');
            }
        $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;
        $reservasi->save();
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil mengubah Reservasi ');
        }

    public function destroy($id)
        {
         //Menghapus Paket Wisata
        $reservasi = reservasi::find($id);
        if ($reservasi) {
            $hapus = $reservasi->delete();
            if ($hapus)
                unlink("storage/" . $reservasi->file_bukti_tf);
        }
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menghapus Reservasi');
        }



}
