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
        $datas = [
            'pageTitle' => 'Dashboard',
        ];

        return view('dashboard.index', $datas);

        // Inertia::setRootView('react.dashboard');
        // return Inertia::render('Dashboard/Index');
    }
}
