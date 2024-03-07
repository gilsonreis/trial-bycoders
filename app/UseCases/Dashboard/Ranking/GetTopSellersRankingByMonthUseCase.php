<?php

namespace App\UseCases\Dashboard\Ranking;

use App\Repositories\Reports\ReportsRepositoryInterface;

class GetTopSellersRankingByMonthUseCase
{
    public function __construct(private readonly ReportsRepositoryInterface $reportsRepository)
    {
    }

    public function handle(string $yearMonth)
    {
        return $this->reportsRepository->getTopSellersByMonth($yearMonth);
    }
}
