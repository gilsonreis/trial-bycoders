<?php

namespace App\Providers;


use App\Repositories\CarBrands\CarBrandRepository;
use App\Repositories\CarBrands\CarBrandRepositoryInterface;
use App\Repositories\CarModels\CarModelRepository;
use App\Repositories\CarModels\CarModelRepositoryInterface;
use App\Repositories\Reports\ReportsRepository;
use App\Repositories\Reports\ReportsRepositoryInterface;
use App\Repositories\Sales\SaleRepository;
use App\Repositories\Sales\SaleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserInfos\UserInfosInfosRepository;
use App\Repositories\UserInfos\UserInfosRepositoryInterface;
use App\Services\Charts\ChartService;
use App\Services\Charts\ChartServiceInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserInfosRepositoryInterface::class, UserInfosInfosRepository::class);
        $this->app->bind(ReportsRepositoryInterface::class, ReportsRepository::class);
        $this->app->bind(CarBrandRepositoryInterface::class, CarBrandRepository::class);
        $this->app->bind(CarModelRepositoryInterface::class, CarModelRepository::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);

        // Services
        $this->app->bind(ChartServiceInterface::class, ChartService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
