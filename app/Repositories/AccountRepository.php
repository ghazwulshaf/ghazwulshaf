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
        $datas = Account::select([
            'accounts.id',
            'accounts.name',
            'accounts.link',
            'accounts.icon',
        ])
            ->get()
            ->toArray();

        return $datas;
    }
}