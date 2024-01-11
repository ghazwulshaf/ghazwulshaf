<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model
     * 
     * @var string
     */
    protected $table = 'categories';

    /**
     * Atribut tabel yang dapat ditambah dan diubah
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'file_name',
        'path',
    ];
}
