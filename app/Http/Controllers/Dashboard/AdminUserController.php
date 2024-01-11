<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Repository untuk halaman admin user
     * 
     * @param AccountRepository $accountRepo
     */
    public AccountRepository $accountRepo;

    public function __construct(AccountRepository $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }

    /**
     * Fungsi untuk menampilkan halaman admin user
     */
    public function index()
    {
        $accounts = $this->accountRepo->getAll();

        $datas = [
            'accounts' => $accounts,
        ];

        return view('dashboard.user.index', $datas);
    }
}
