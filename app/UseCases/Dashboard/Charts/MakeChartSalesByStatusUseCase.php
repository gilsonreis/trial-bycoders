<?php

namespace App\UseCases\Dashboard\Charts;

use App\Repositories\Reports\ReportsRepositoryInterface;
use App\Services\Charts\ChartServiceInterface;

class MakeChartSalesByStatusUseCase
{
    public function __construct(
        private readonly ReportsRepositoryInterface $reportsRepository,
        private readonly ChartServiceInterface      $chartService
    )
    {
    }

    public function handle()
    {
        $data = $this->reportsRepository->getTotalSalesByStatus();
        return $this->chartService->makePieChart($data, 'Sales by status', ['showLegend' => false]);
    }
}
