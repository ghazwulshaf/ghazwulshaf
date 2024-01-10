<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman dashboard admin
     */
    public function index()
    {
        Inertia::setRootView('react.dashboard');

        // return Inertia::render('Dashboard/Index');
        return view('dashboard.index');
    }
}
