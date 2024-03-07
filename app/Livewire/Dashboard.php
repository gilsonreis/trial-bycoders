<?php

namespace App\Livewire;

use App\UseCases\Dashboard\Charts\MakeChartSalesByDayUseCase;
use App\UseCases\Dashboard\Charts\MakeChartSalesByModelUseCase;
use App\UseCases\Dashboard\Charts\MakeChartSalesByStatusUseCase;
use App\UseCases\Dashboard\Charts\MakeChartSalesLast12MonthsByUserUseCase;
use App\UseCases\Dashboard\Counters\GetSalesByMonthUseCase;
use App\UseCases\Dashboard\Counters\GetSalesTodayUseCase;
use App\UseCases\Dashboard\Ranking\GetBestSellingBrandsByMonthUseCase;
use App\UseCases\Dashboard\Ranking\GetBestSellingModelsByMonthUseCase;
use App\UseCases\Dashboard\Ranking\GetTopSellersRankingByMonthUseCase;
use App\UseCases\Users\ListAllSellersUseCase;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public string $chartDays = "30";
    public string $sellerId;


    public function render(
        GetSalesByMonthUseCase $salesByMonthUseCase,
        GetSalesTodayUseCase $salesTodayUseCase,
        GetTopSellersRankingByMonthUseCase $topSellersRankingByMonthUseCase,
        GetBestSellingBrandsByMonthUseCase $bestSellingBrandsByMonthUseCase,
        GetBestSellingModelsByMonthUseCase $bestSellingModelsByMonthUseCase,
        MakeChartSalesByDayUseCase $chartSalesByDayUseCase,
        ListAllSellersUseCase $allSellersUseCase,
        MakeChartSalesLast12MonthsByUserUseCase $salesLast12MonthsByUserUseCase,
        MakeChartSalesByModelUseCase $salesByModelUseCase,
        MakeChartSalesByStatusUseCase $salesByStatusUseCase
    )
    {
        $yearMonth = date('Y-m');
        $salesCurrentMonth = $salesByMonthUseCase->handle($yearMonth);

        $salesToday = $salesTodayUseCase->handle();

        $rankingTopSellers = $topSellersRankingByMonthUseCase->handle($yearMonth);
        $rankingTopBrands = $bestSellingBrandsByMonthUseCase->handle($yearMonth);
        $rankingTopModels = $bestSellingModelsByMonthUseCase->handle($yearMonth);
        $chartSalesByDay = $chartSalesByDayUseCase->handle($this->chartDays);
        $allSellers = $allSellersUseCase->handle();

        $this->sellerId ??= $allSellers[0]['id'];
        $chartSalesLast12Month = $salesLast12MonthsByUserUseCase->handle($this->sellerId);

        $chartSalesByModel = $salesByModelUseCase->handle();
        $chartSalesByStatus = $salesByStatusUseCase->handle();

        return view('livewire.dashboard', [
            'qtySalesCurrentMonth' => $salesCurrentMonth['qty'],
            'totalVelueSalesCurrentMonth' => $salesCurrentMonth['value'],
            'qtySalesToday' => $salesToday['qty'],
            'totalVelueSalesToday' => $salesToday['value'],
            'rankingTopSellers' => $rankingTopSellers,
            'rankingTopBrands' => $rankingTopBrands,
            'rankingTopModels' => $rankingTopModels,
            'chartsSalesByDay' => $chartSalesByDay,
            'allSellers' => $allSellers,
            'chartSalesLast12Month' => $chartSalesLast12Month,
            'chartSalesByModel' => $chartSalesByModel,
            'chartSalesByStatus' => $chartSalesByStatus
        ]);
    }

    public function placeholder()
    {
        return <<<'HTML'
            <div><p>Carregando .. </p></div>
HTML;

    }
}
