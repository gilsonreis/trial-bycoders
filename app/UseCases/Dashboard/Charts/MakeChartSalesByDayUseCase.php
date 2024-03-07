<?php

namespace App\UseCases\Dashboard\Charts;

use App\Repositories\Reports\ReportsRepositoryInterface;
use App\Services\Charts\ChartServiceInterface;
use DateInterval;
use DateTime;

class MakeChartSalesByDayUseCase
{
    public function __construct(
        private readonly ReportsRepositoryInterface $reportsRepository,
        private readonly ChartServiceInterface $chartService
    )
    {
    }

    public function handle(string $daysInterval)
    {
        $endDate = new DateTime();
        $startDate = (clone $endDate)->sub(new DateInterval("P{$daysInterval}D"));

        $data = $this->reportsRepository->getSalesByDay(
            $startDate->format('Y-m-d H:i:s'), $endDate->format('Y-m-d H:i:s')
        );

        return $this->chartService->makeColumnChart($data, "Sales by day", ['showLegend' => false]);
    }
}
