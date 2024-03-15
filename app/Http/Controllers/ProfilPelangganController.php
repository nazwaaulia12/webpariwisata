<?php

namespace App\Http\Controllers;

use App\Models\pelanggan; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilPelangganController extends Controller
{
    public function index(){
        //Menampilkan Profil Pelanggan
        $pelanggan = pelanggan::where('nama_lengkap', Auth::user()->name)->first(); 
        return view('profil-pelanggan.index', ['pelanggan' => $pelanggan]);
        }

        public function edit($id)
        { 
        //Menampilkan Form Edit Guru
        $pelanggan = pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('profil-pelanggan.index')->with('error_message', 'Pelanggan dengan id = '.$id.' tidak ditemukan');
        return view('profil-pelanggan.edit', [ 
        'pelanggan' => $pelanggan,
        'users' => User::all()
        ]);
        } 
        public function update(Request $request, $id)
        { 
        //Mengedit Data Guru
        $request->validate([
        'nama_lengkap' => 'required', 
        'no_hp'=> 'required',
        'alamat'=> 'required',
        'foto'=> $request->file('foto') != null ?'image|file|max:2048' : '',
        'id_user'=> 'required'
        ]);
        $pelanggan = pelanggan::find($id);
        $pelanggan->nama_lengkap = $request->nama_lengkap;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->id_user = $request->id_user;
        if($request->file('foto') != null){
            unlink("storage/" . $pelanggan->foto);
            $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
            }
        $pelanggan->save();
        return redirect()->route('profil-pelanggan.index')->with('success_message', 'Berhasil mengubah Pelanggan ');
        }
}
