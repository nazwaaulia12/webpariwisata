<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('karyawan.index', [ 
        'karyawan' => $karyawan
        ]);
        } 

    public function create(){ 
        return view( 
        'karyawan.create', [ 
        'users' => User::all() 
        ]);
        } 

    public function store(Request $request)
        { 
        $request->validate([
        'nama_karyawan' => 'required|unique:karyawan,nama_karyawan', 
        'alamat'=> 'required',
        'no_hp'=> 'required',
        'jabatan'=> 'required',
        'id_user'=> 'required'
        ]);
        $array = $request->only([
        'nama_karyawan', 
        'alamat',
        'no_hp',
        'jabatan',
        'id_user'
        ]);
        Karyawan::create($array);
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil menambah Daftar Karyawan baru');
        }

    public function edit($id)
        { 
        $karyawan = Karyawan::find($id);
        if (!$karyawan) return redirect()->route('karyawan.index')->with('error_message', 'Daftar Karyawan dengan id = '.$id.'tidak ditemukan');
        return view('karyawan.edit', [ 
        'karyawan' => $karyawan,
        'users' => User::all()
        ]);
        } 
        public function update(Request $request, $id)
        { 
        $request->validate([
        'nama_karyawan' => 'required', 
        'alamat'=> 'required',
        'no_hp'=> 'required',
        'jabatan'=> 'required',
        'id_user'=> 'required'
        ]);
        $karyawan = Karyawan::find($id);
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_hp = $request->no_hp;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->id_user = $request->id_user;
        $karyawan->save();
        return redirect()->route('karyawan.index')->with('success_message', 'Berhasil mengubah Daftar Karyawan');
        }
        
    public function destroy(Request $request, $id)
        { 
        $karyawan = Karyawan::find($id);
        if ($karyawan) $karyawan->delete();
        return redirect()->route('karyawan.index') 
        ->with('success_message', 'Berhasil menghapus Daftar Karyawan "' . $karyawan->karyawan . '!');
        }
}
