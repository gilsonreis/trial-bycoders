<?php

namespace App\Repositories\CarModels;

interface CarModelRepositoryInterface
{
    public function listAllModelsToDropdown(?string $brandId = null): ?array;
}
