<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PemilikUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pemilik-users.index', [
        'users' => $users
        ]);
    }
}
