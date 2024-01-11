<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * Tabel yang terhubung dengan model
     * 
     * @var string
     */
    protected $table = 'accounts';

    /**
     * Daftar atribut tabel yang dapat diubah
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'link',
        'icon',
    ];
}
