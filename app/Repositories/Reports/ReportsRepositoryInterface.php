<?php

namespace App\Repositories\Reports;

interface ReportsRepositoryInterface
{
    public function getTotalSalesByMonth(string $yearMonth): ?array;

    public function getTotalSalesToday(): ?array;

    public function getTopSellersByMonth(string $yearMonth, int $limit = 3): ?array;

    public function getBestSellingBrandsByMonth(string $yearMonth, int $limit = 3): ?array;

    public function getBestSellingModelsByMonth(string $yearMonth, int $limit = 3): ?array;

    public function getSalesByDay(string $startDate, string $endDate): ?array;

    public function getSalesLast12MonthsByUser(int $userId): ?array;

    public function getSalerGroupedByModel(): ?array;

    public function getTotalSalesByStatus(): ?array;
}
