<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Repositories\AccountRepository;
use App\Repositories\PortofolioRepository;
use Illuminate\Http\Request;

class HomepageProjectsController extends Controller
{
    public PortofolioRepository $portoRepo;

    public function __construct(PortofolioRepository $portoRepo)
    {
        $this->portoRepo = $portoRepo;
    }

    /**
     * Function for display homepage projects page
     */
    public function index()
    {
        $accounts = app(AccountRepository::class)->getAll();
        $portofolios = $this->portoRepo->getAllWithFilter(true, 5);

        $datas = [
            'accounts' => $accounts,
            'portofolios' => $portofolios,
        ];

        return view('homepage.projects.index', $datas);
    }
}
