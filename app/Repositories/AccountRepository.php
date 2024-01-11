<?php

namespace App\Repositories;

use App\Models\Account;

/**
 * Repositori untuk mengatur pengambilan data
 */
class AccountRepository
{
    /**
     * Fungsi untuk mengambil seluruh data account
     * 
     * @return array
     */
    public function getAll(): array
    {
        $datas = Account::all()->toArray();

        return $datas;
    }
}