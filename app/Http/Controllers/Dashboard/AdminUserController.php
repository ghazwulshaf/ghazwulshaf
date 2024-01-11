<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Repository untuk halaman admin user
     * 
     * @param AccountRepository $accountRepo
     * @param CategoryRepository $categoryRepo
     */
    public AccountRepository $accountRepo;
    public CategoryRepository $categoryRepo;

    public function __construct(
        AccountRepository $accountRepo,
        CategoryRepository $categoryRepo,
    )
    {
        $this->accountRepo = $accountRepo;
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Fungsi untuk menampilkan halaman admin user
     */
    public function index()
    {
        $accounts = $this->accountRepo->getAll();
        $categories = $this->categoryRepo->getAll();

        $datas = [
            'accounts' => $accounts,
            'categories' => $categories,
        ];

        return view('dashboard.user.index', $datas);
    }
}
