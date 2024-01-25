<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class HomepageHomeController extends Controller
{
    /**
     * Function for show homepage home index page
     */
    public function index()
    {
        $portofolios = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image AS image',
            'portofolios.content',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->limit(4)
            ->get();

        $datas = [
            'portofolios' => $portofolios,
        ];

        return view('homepage.home.index', $datas);
    }
}
