<?php

namespace App\UseCases\Dashboard\Ranking;

use App\Repositories\Reports\ReportsRepositoryInterface;

class GetBestSellingBrandsByMonthUseCase
{
    public function __construct(private readonly ReportsRepositoryInterface $reportsRepository)
    {
    }

    public function handle(string $yearMonth)
    {
        return $this->reportsRepository->getBestSellingBrandsByMonth($yearMonth);
    }
}
