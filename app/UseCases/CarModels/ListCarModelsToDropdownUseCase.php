<?php

namespace App\UseCases\CarModels;

use App\Repositories\CarModels\CarModelRepositoryInterface;

class ListCarModelsToDropdownUseCase
{
    public function __construct(private readonly CarModelRepositoryInterface $carModelRepository)
    {
    }

    public function handle(?string $brandId = null)
    {
        return $this->carModelRepository->listAllModelsToDropdown($brandId);
    }
}
