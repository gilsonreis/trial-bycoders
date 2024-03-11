<?php

namespace App\Repositories\CarBrands;

interface CarBrandRepositoryInterface
{
    public function listAllBrandsToDropdown(): ?array;
}
