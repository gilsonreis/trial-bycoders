<?php

namespace App\Repositories\CarBrands;

use App\Models\CarBrand;
use App\Repositories\CarBrands\CarBrandRepositoryInterface;

class CarBrandRepository implements CarBrandRepositoryInterface
{
    public function listAllBrandsToDropdown(): ?array
    {
        return CarBrand::query()->orderBy('name', 'asc')->get(['id', 'name'])?->toArray();
    }
}
