<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPortofolioController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman admin portoflio
     */
    public function index()
    {
        $datas = [
            'pageTitle' => 'Portofolio',
            'title' => 'Portofolio',
        ];

        return view('dashboard.portofolio.index', $datas);
    }
}
