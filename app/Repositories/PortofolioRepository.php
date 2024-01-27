<?php

namespace App\Repositories;

use App\Models\Portofolio;

class PortofolioRepository
{
    public function getAll()
    {
        $datas = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image AS image',
            'portofolios.content',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id')
            ->paginate(5);

        return $datas;
    }

    public function getAllWithFilter(
        ?bool $isPaginate = false,
        ?int $paginate = 10
    ) {
        $query = Portofolio::select([
            'portofolios.id',
            'portofolios.name',
            'portofolios.path_image AS image',
            'portofolios.content',
            'categories.name AS category',
        ])
            ->join('categories', 'categories.id', 'portofolios.category_id');

        if ($isPaginate) {
            $datas = $query->paginate($paginate);
        } else {
            $datas = $query->get()->toArray();
        }

        return $datas;
    }
}