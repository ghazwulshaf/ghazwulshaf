<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman login
     */
    public function index()
    {
        return view('auth.login');
    }
}
