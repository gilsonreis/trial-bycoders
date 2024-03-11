<?php

namespace App\Repositories\CarModels;

use App\Models\CarModel;
use App\Repositories\CarModels\CarModelRepositoryInterface;

class CarModelRepository implements CarModelRepositoryInterface
{
    public function listAllModelsToDropdown(?string $brandId = null): ?array
    {
        $query = CarModel::query();

        if (!is_null($brandId)) {
            $query->where('brand_id', $brandId);
        }

        $query->orderBy('name', 'asc');

        return $query->get(['id', 'name'])?->toArray();
    }

}
