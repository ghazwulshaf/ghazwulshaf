<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Portofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolios';

    protected $fillable = [
        'name',
        'category_id',
        'path_image',
        'content',
    ];

    /**
     * Every portofolio have a category
     */
    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
