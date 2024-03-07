<?php

namespace App\UseCases\Dashboard\Counters;

use App\Repositories\Reports\ReportsRepositoryInterface;

class GetSalesByMonthUseCase
{
    public function __construct(private readonly ReportsRepositoryInterface $reportsRepository)
    {
    }

    public function handle(string $yearMonth): ?array
    {
        return $this->reportsRepository->getTotalSalesByMonth($yearMonth);
    }
}
