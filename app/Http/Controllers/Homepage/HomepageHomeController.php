<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Category;
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

        $categories = Category::select([
            'categories.name',
            'categories.path AS image',
        ])
            ->get();

        $accounts = Account::select([
            'accounts.name',
            'accounts.link',
            'accounts.icon',
        ])
            ->get();

        $datas = [
            'portofolios' => $portofolios,
            'categories' => $categories,
            'accounts' => $accounts,
        ];

        return view('homepage.home.index', $datas);
    }
}
