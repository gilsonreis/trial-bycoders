<?php

namespace App\Services\Charts;

interface ChartServiceInterface
{
    public function makeColumnChart(array $data, ?string $title, ?array $options = []);

    public function makeLineChart(array $data, ?string $title, ?array $options = []);

    public function makePieChart(array $data, ?string $title, ?array $options = []);
}
