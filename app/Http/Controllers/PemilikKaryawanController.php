<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class PemilikKaryawanController extends Controller
{
    public function index(){
        $karyawan = Karyawan::all();
        return view('pemilik-karyawan.index', [ 
        'karyawan' => $karyawan
        ]);
        } 
}
