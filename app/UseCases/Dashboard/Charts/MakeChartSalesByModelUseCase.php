<?php

namespace App\UseCases\Dashboard\Charts;

use App\Repositories\Reports\ReportsRepositoryInterface;
use App\Services\Charts\ChartServiceInterface;

class MakeChartSalesByModelUseCase
{
    public function __construct(
        private readonly ReportsRepositoryInterface $reportsRepository,
        private readonly ChartServiceInterface $chartService
    )
    {
    }

    public function handle()
    {
        $data = $this->reportsRepository->getSalerGroupedByModel();
        return $this->chartService->makePieChart($data, "Sales by car models", ['showLegend' => false]);
    }
}
