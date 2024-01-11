<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $whatsapp = [
            'name' => 'WhatsApp',
            'link' => 'whatsapp.be/+6282358711144',
            'icon' => '<i class="fa-brands fa-square-whatsapp"></i>',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Account::insert($whatsapp);
    }
}
