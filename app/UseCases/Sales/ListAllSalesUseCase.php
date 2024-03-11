<?php

namespace App\UseCases\Sales;

use App\Repositories\Sales\SaleRepositoryInterface;

class ListAllSalesUseCase
{
    public function __construct(private readonly SaleRepositoryInterface $saleRepository)
    {
    }

    public function handle(
        ?string $dateFrom = '',
        ?string $dateTo = '',
        ?string $carBrandId = '',
        ?string $carModelId = '',
        ?string $sellerId = '',
        ?string $customerId = '',
        ?string $status = '',
    )
    {
        return $this->saleRepository->listAllSales(
            $dateFrom,
            $dateTo,
            $carBrandId,
            $carModelId,
            $sellerId,
            $customerId,
            $status,
        );
    }
}
