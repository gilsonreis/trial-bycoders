<?php

namespace App\UseCases\CarBrands;

use App\Repositories\CarBrands\CarBrandRepositoryInterface;

class ListCarBrandsToDropdownUseCase
{
    public function __construct(private readonly CarBrandRepositoryInterface $carBrandRepository)
    {
    }

    public function handle()
    {
        return $this->carBrandRepository->listAllBrandsToDropdown();
    }
}
