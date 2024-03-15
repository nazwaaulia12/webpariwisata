<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PemilikPelangganController extends Controller
{
    public function index(){
        $pelanggan = pelanggan::all();
        return view('pemilik-pelanggan.index', [ 
        'pelanggan' => $pelanggan
        ]);
        } 
}
