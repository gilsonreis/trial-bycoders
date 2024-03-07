<?php

namespace App\UseCases\Dashboard\Counters;

use App\Repositories\Reports\ReportsRepositoryInterface;

class GetSalesTodayUseCase
{
    public function __construct(private readonly ReportsRepositoryInterface $reportsRepository)
    {
    }

    public function handle()
    {
        return $this->reportsRepository->getTotalSalesToday();
    }
}
