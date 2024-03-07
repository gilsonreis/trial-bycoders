<?php

namespace App\Services\Charts;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;

class ChartService implements ChartServiceInterface
{
    private $colors = ['#845ec2', '#d65db1', '#ff6f91', '#ff9671', '#ffc75f', '#f9f871', '#2c73d2', '#0089ba', '#b39cd0', '#c34a36'];
    public function makeColumnChart(array $data, ?string $title, ?array $options = [])
    {
        $chart = LivewireCharts::columnChartModel()
            ->setTitle($title ?? "No Title")
            ->setAnimated(true)
            ->withGrid()
            ->setGridVisible(true);

        foreach ($data as $item) {
            $chart->addColumn($item->title, $item->value, "#c34a36");
        }

        if (isset($options['showLegend'])) {
            $chart->setLegendVisibility($options['showLegend']);
        }

        $chart->setJsonConfig([
            'tooltip.y.formatter' => '(val) => `${val} sale(s)`'
        ]);

        return $chart;

    }

    public function makeLineChart(array $data, ?string $title, ?array $options = [])
    {
        $chart = LivewireCharts::lineChartModel()
            ->setTitle($title ?? 'No Title')
            ->setAnimated(true)
            ->withGrid()
            ->setGridVisible(true);

        foreach ($data as $item) {
            $chart->addPoint($item->title, $item->value, '#c34a36');
        }

        if (isset($options['showLegend'])) {
            $chart->setLegendVisibility($options['showLegend']);
        }

        $chart->setJsonConfig([
            'tooltip.y.formatter' => '(val) => `${val} sale(s)`'
        ]);

        return $chart;

    }

    public function makePieChart(array $data, ?string $title, ?array $options = [])
    {
        $chart = LivewireCharts::pieChartModel()
            ->setTitle($title)
            ->setAnimated(true);

        foreach ($data as $i => $item) {
            $chart->addSlice($item->title, $item->value, $this->colors[$i]);
        }

        if (isset($options['showLegend'])) {
            $chart->setLegendVisibility($options['showLegend']);
        }

        return $chart;

    }
}
