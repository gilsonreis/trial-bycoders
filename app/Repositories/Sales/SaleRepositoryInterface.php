<?php

namespace App\Repositories\Sales;

interface SaleRepositoryInterface
{
    public function listAllSales(
        ?string $dateFrom = '',
        ?string $dateTo = '',
        ?string $carBrandId = '',
        ?string $carModelId = '',
        ?string $sellerId = '',
        ?string $customerId = '',
        ?string $status = '',
    );
}
