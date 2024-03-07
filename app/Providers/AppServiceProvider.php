<?php

namespace App\Providers;


use App\Repositories\Reports\ReportsRepository;
use App\Repositories\Reports\ReportsRepositoryInterface;
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
