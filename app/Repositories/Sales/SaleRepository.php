<?php

namespace App\Repositories\Sales;

use App\Models\Sale;
use App\Repositories\Sales\SaleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SaleRepository implements SaleRepositoryInterface
{
    public function listAllSales(
        ?string $dateFrom = "",
        ?string $dateTo = "",
        ?string $carBrandId = "",
        ?string $carModelId = "",
        ?string $sellerId = "",
        ?string $customerId = "",
        ?string $status = "",
    )
    {
        $query = Sale::query()
            ->select('sales.id', 'users_seller.name as seller', 'users_customer.name as customer',
                'car_models.name as model', 'car_brands.name as brand', 'sales.created_at',
                'sales.sale_value as price', 'sales.commission', 'sales.status')
            ->join('users as users_seller', 'sales.seller_id', '=', 'users_seller.id')
            ->join('users as users_customer', 'sales.customer_id', '=', 'users_customer.id')
            ->join('car_details', 'sales.car_detail_id', '=', 'car_details.id')
            ->join('car_models', 'car_details.model_id', '=', 'car_models.id')
            ->join('car_brands', 'car_models.brand_id', '=', 'car_brands.id');

        $query->when($dateFrom && $dateTo, function ($query) use ($dateFrom, $dateTo) {
            return $query->whereBetween('sales.created_at', [$dateFrom . ' 00:00:00', $dateTo . ' 23:59:59']);
        });

        $query->when($sellerId, function ($query) use ($sellerId) {
            return $query->where('sales.seller_id', $sellerId);
        });

        $query->when($customerId, function ($query) use ($customerId) {
            return $query->where('sales.customer_id', $customerId);
        });

        $query->when($carModelId, function ($query) use ($carModelId) {
            return $query->where('car_models.id', $carModelId);
        });

        $query->when($carBrandId, function ($query) use ($carBrandId) {
            return $query->where('car_brands.id', $carBrandId);
        });

        $query->when($status, function ($query) use ($status) {
            return $query->where('sales.status', $status);
        });

        $query->orderBy('sales.created_at', 'desc');

        return $query->paginate();

    }
}
