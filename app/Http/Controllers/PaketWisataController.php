<?php

namespace App\Http\Controllers;

use App\Models\Paket_Wisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    public function index(){
        $paketwisata = Paket_Wisata::all();
        return view('paket_wisata.index', [ 
        'paketwisata' => $paketwisata
        ]);
        } 

    public function create(){
        return view('paket_wisata.create');
        } 

    public function store(Request $request){
        $request->validate([
        'nama_paket' => 'required|unique:paket_wisata,nama_paket', 
        'deskripsi' => 'required', 
        'fasilitas' => 'required', 
        'itinerary' => 'required', 
        'diskon' => 'required', 
        'foto1' => 'required|image|file|max:2048', 
        'foto2' => 'required|image|file|max:2048', 
        'foto3' => 'required|image|file|max:2048', 
        'foto4' => 'required|image|file|max:2048',
        'foto5' => 'required|image|file|max:2048'
        ]);
        $array = $request->only([
        'nama_paket', 
        'deskripsi', 
        'fasilitas', 
        'itinerary', 
        'diskon', 
        'foto1', 
        'foto2', 
        'foto3', 
        'foto4', 
        'foto5'
        ]);
        
        $array['foto1'] = $request->file('foto1')->store('Foto 1');
        $array['foto2'] = $request->file('foto2')->store('Foto 2');
        $array['foto3'] = $request->file('foto3')->store('Foto 3');
        $array['foto4'] = $request->file('foto4')->store('Foto 4');
        $array['foto5'] = $request->file('foto5')->store('Foto 5');
        $tambah= Paket_Wisata::create($array);
        if($tambah) $request->file('foto1')->store('Foto 1');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if($tambah) $request->file('foto2')->store('Foto 2');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if($tambah) $request->file('foto3')->store('Foto 3');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if($tambah) $request->file('foto4')->store('Foto 4');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        if($tambah) $request->file('foto5')->store('Foto 5');
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menambah Paket Wisata');
        }

        public function edit($id)
        {
            //Menampilkan Form Edit
            $paketwisata = Paket_Wisata::find($id);
            if (!$paketwisata)
                return redirect()->route('paket_wisata.index')->with('error_message', 'paket dengan id' . $id . ' tidak ditemukan');
            return view('paket_wisata.edit', [
                'paketwisata' => $paketwisata
            ]);
        }
    
        public function update(Request $request, $id)
    {
        //Mengedit Data Standar Kompetensi
        $request->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => $request->file('foto1') != null ? 'image|file|max:2048' : '',
            'foto2' => $request->file('foto2') != null ? 'image|file|max:2048' : '',
            'foto3' => $request->file('foto3') != null ? 'image|file|max:2048' : '',
            'foto4' => $request->file('foto4') != null ? 'image|file|max:2048' : '',
            'foto5' => $request->file('foto5') != null ? 'image|file|max:2048' : ''
        ]);
        $paketwisata = Paket_Wisata::find($id);
        $paketwisata->nama_paket = $request->nama_paket;
        $paketwisata->deskripsi = $request->deskripsi;
        $paketwisata->fasilitas = $request->fasilitas;
        $paketwisata->itinerary = $request->itinerary;
        $paketwisata->diskon = $request->diskon;
        if($request->file('foto1') != null){
            unlink("storage/" . $paketwisata->foto1);
            $paketwisata->foto1 = $request->file('foto1')->store('Foto 1');
            }
        $paketwisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto2') != null){
            unlink("storage/" . $paketwisata->foto2);
            $paketwisata->foto2 = $request->file('foto2')->store('Foto 2');
            }
        $paketwisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto3') != null){
            unlink("storage/" . $paketwisata->foto3);
            $paketwisata->foto3 = $request->file('foto3')->store('Foto 3');
            }
        $paketwisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto4') != null){
            unlink("storage/" . $paketwisata->foto4);
            $paketwisata->foto4 = $request->file('foto4')->store('Foto 4');
            }
        $paketwisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto5') != null){
            unlink("storage/" . $paketwisata->foto5);
            $paketwisata->foto5 = $request->file('foto5')->store('Foto 5');
            }
        $paketwisata->save();
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }

    public function destroy($id)
    {
         //Menghapus Paket Wisata
        $paketwisata = Paket_Wisata::find($id);
        if ($paketwisata) {
            $hapus = $paketwisata->delete();
            if ($hapus)
                unlink("storage/" . $paketwisata->foto1);
        }
        return redirect()->route('paket_wisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata');
    }
}

