<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll(): array
    {
        $datas = Category::all()->toArray();

        return $datas;
    }
}