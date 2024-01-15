<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class AdminPortofolioController extends Controller
{
    /**
     * Fungsi untuk menampilkan halaman admin portoflio
     */
    public function index()
    {
        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->paginate(10);

        $items = view('dashboard.portofolio.indexGrid', ['datas' => $portofolios]);

        $datas = [
            'pageTitle' => 'Portofolio',
            'title' => 'Portofolio',
            'portofolios' => $portofolios,
            'items' => $items,
        ];

        return view('dashboard.portofolio.index', $datas);
    }

    /**
     * Fungsi untuk menampilkan halaman admin tambah portofolio
     */
    public function create()
    {
        $datas = [
            'isSubPage' => true,
            'pageTitle' => 'Add Portofolio',
            'title' => 'Add Portofolio',
            'categories' => Category::all()->toArray(),
        ];

        return view('dashboard.portofolio.create', $datas);
    }

    /**
     * Fungsi untuk menjalankan live search halaman portofolio
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->where('portofolios.name', 'like', '%'.$search.'%')
            ->orWhere('categories.name', 'like', '%'.$search.'%')
            ->paginate(10);

        $items = view('dashboard.portofolio.indexGrid', ['datas' => $portofolios]);

        return response($items);
    }
}
