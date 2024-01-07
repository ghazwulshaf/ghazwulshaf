<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman dashboard admin
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
