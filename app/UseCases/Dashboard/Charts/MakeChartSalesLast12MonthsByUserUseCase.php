<?php

namespace App\UseCases\Dashboard\Charts;

use App\Repositories\Reports\ReportsRepositoryInterface;
use App\Services\Charts\ChartServiceInterface;

class MakeChartSalesLast12MonthsByUserUseCase
{
    public function __construct(
        private readonly ReportsRepositoryInterface $reportsRepository,
        private readonly ChartServiceInterface      $chartService
    )
    {
    }

    public function handle(int $userId)
    {
        $data = $this->reportsRepository->getSalesLast12MonthsByUser($userId);
        return $this->chartService->makeLineChart($data, 'Sales by seller', ['showLegend' => false]);
    }
}
