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

        $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);

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
     * Fungsi untuk menampilkan halaman detail portofolio
     * 
     * @param int $id
     */
    public function view(int $id)
    {
        $portofolio = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'portofolios.content',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->where('portofolios.id', $id)
            ->get()
            ->first();

        $datas = [
            'isSubPage' => true,
            'pageTitle' => $portofolio['name'],
            'title' => $portofolio['name'],
            'data' => $portofolio,
        ];

        return view('dashboard.portofolio.view', $datas);
    }

    /**
     * Fungsi untuk menampilkan halaman edit portofolio
     * 
     * @param int $id
     */
    public function edit(int $id)
    {
        $portofolio = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'portofolios.content',
            'portofolios.category_id',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->where('portofolios.id', $id)
            ->get()
            ->first();

        $datas = [
            'isSubPage' => true,
            'pageTitle' => 'Edit '.$portofolio['name'],
            'title' => 'Edit '.$portofolio['name'],
            'data' => $portofolio,
            'categories' => Category::all()->toArray(),
        ];

        return view('dashboard.portofolio.edit', $datas);
    }

    /**
     * Fungsi untuk menjalankan live sorting halaman portofolio
     */
    public function sort(Request $request)
    {
        $sort = $request->sort;
        $search = $request->search;
        $mode = $request->mode;

        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id');

        if ($search) {
            $portofolios = $portofolios->where('portofolios.name', 'like', '%'.$search.'%')
                ->orWhere('categories.name', 'like', '%'.$search.'%');
        }

        $portofolios = $portofolios->orderBy($sort, 'asc')->paginate(10);

        $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);

        // if ($mode) {
        //     if ($mode === 'grid') {
        //         $items = view('dashboard.portofolio.indexGrid', ['datas' => $portofolios]);
        //     }
        //     elseif ($mode === 'table') {
        //         $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);
        //     }
        // }

        return response($items);
    }

    /**
     * Fungsi untuk menjalankan live search halaman portofolio
     */
    public function search(Request $request)
    {
        // $sort = $request->sort;
        $search = $request->search;
        // $mode = $request->mode;

        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->where('portofolios.name', 'like', '%'.$search.'%')
            ->orWhere('categories.name', 'like', '%'.$search.'%');

        // if ($sort) {
        //     $portofolios = $portofolios->orderBy($sort, 'asc');
        // }

        $portofolios = $portofolios->paginate(10);

        $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);

        // if ($mode) {
        //     if ($mode === 'grid') {
        //         $items = view('dashboard.portofolio.indexGrid', ['datas' => $portofolios]);
        //     }
        //     elseif ($mode === 'table') {
        //         $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);
        //     }
        // }

        return response($items);
    }

    /**
     * Fungsi untuk menjalankan live change preview halaman portofolio
     */
    public function mode(Request $request)
    {
        $sort = $request->sort;
        $search = $request->search;
        $mode = $request->mode;

        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id');

        if ($search) {
            $portofolios = $portofolios->where('portofolios.name', 'like', '%'.$search.'%')
                ->orWhere('categories.name', 'like', '%'.$search.'%');
        }

        if ($sort) {
            $portofolios = $portofolios->orderBy($sort, 'asc');
        }

        $portofolios = $portofolios->paginate(10);

        $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);

        // if ($mode === 'grid') {
        //     $items = view('dashboard.portofolio.indexGrid', ['datas' => $portofolios]);
        // }
        // elseif ($mode === 'table') {
        //     $items = view('dashboard.portofolio.indexTable', ['datas' => $portofolios]);
        // }

        return response($items);
    }
}
