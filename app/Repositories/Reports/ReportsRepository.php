<?php

namespace App\Repositories\Reports;

use App\Repositories\Reports\ReportsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ReportsRepository implements ReportsRepositoryInterface
{
    public function getTotalSalesByMonth(string $yearMonth): ?array
    {
        $sql = "SELECT
                    COUNT(id) AS qty,
                    SUM(sale_value) AS `value`
                FROM
                    sales
                WHERE
                    DATE_FORMAT(created_at, '%Y-%m') = :yearMonth
                    AND status = 'completed'";

        return (array)DB::selectOne($sql, [':yearMonth' => $yearMonth]);
    }

    public function getTotalSalesToday(): ?array
    {
        $sql = "SELECT
                    COUNT(id) AS qty,
                    SUM(sale_value) AS `value`
                FROM sales
                WHERE DATE(created_at) = CURDATE()
                  AND status = 'completed';";

        return (array)DB::selectOne($sql);
    }

    public function getTopSellersByMonth(string $yearMonth, int $limit = 3): ?array
    {
        $sql = "SELECT u.name            AS name,
                       COUNT(s.id)       AS total
                FROM sales s
                         INNER JOIN
                     users u ON s.seller_id = u.id
                WHERE DATE_FORMAT(s.created_at, '%Y-%m') = :yearMonth
                  AND s.status = 'completed'
                GROUP BY s.seller_id
                ORDER BY total DESC
                LIMIT :limit;";

        return DB::select($sql, [':yearMonth' => $yearMonth, ':limit' => $limit]);
    }

    public function getBestSellingBrandsByMonth(string $yearMonth, int $limit = 3): ?array
    {
        $sql = "SELECT cb.name      AS name,
                       COUNT(sd.id) AS total
                FROM car_brands cb
                         JOIN
                     car_models cm ON cb.id = cm.brand_id
                         JOIN
                     car_details cd ON cm.id = cd.model_id
                         JOIN
                     sales sd ON cd.id = sd.car_detail_id
                WHERE sd.status = 'completed'
                  AND DATE_FORMAT(sd.created_at, '%Y-%m') = :yearMonth
                GROUP BY cb.id
                ORDER BY total DESC
                LIMIT :limit;";

        return DB::select($sql, [':yearMonth' => $yearMonth, ':limit' => $limit]);
    }

    public function getBestSellingModelsByMonth(string $yearMonth, int $limit = 3): ?array
    {
        $sql = "SELECT cm.name      AS name,
                       COUNT(sd.id) AS total
                FROM car_models cm
                         JOIN
                     car_details cd ON cm.id = cd.model_id
                         JOIN
                     sales sd ON cd.id = sd.car_detail_id
                WHERE sd.status = 'completed'
                  AND DATE_FORMAT(sd.created_at, '%Y-%m') = :yearMonth
                GROUP BY cm.id
                ORDER BY total DESC
                LIMIT :limit;";

        return DB::select($sql, [':yearMonth' => $yearMonth, ':limit' => $limit]);
    }

    public function getSalesByDay(string $startDate, string $endDate): ?array
    {
        $sql = "SELECT DATE(created_at) AS title,
                       COUNT(id)        AS value
                FROM sales
                WHERE DATE(created_at) BETWEEN :startDate AND :endDate
                  AND status = 'completed'
                GROUP BY title
                ORDER BY title;";

        return DB::select($sql, [':startDate' => $startDate, ':endDate' => $endDate]);
    }

    public function getSalesLast12MonthsByUser(int $userId): ?array
    {
        $sql = "SELECT
                    DATE_FORMAT(s.created_at, '%Y-%m') AS title,
                    COUNT(s.id) AS value
                FROM
                    sales s
                WHERE
                    s.seller_id = :userId
                    AND s.status = 'completed'
                    AND s.created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
                GROUP BY
                    title
                ORDER BY
                    title;";

        return DB::select($sql, [':userId' => $userId]);
    }

    public function getSalerGroupedByModel(): ?array
    {
        $sql = "SELECT cm.name      AS title,
                       COUNT(sd.id) AS value
                FROM car_models cm
                         JOIN
                     car_details cd ON cm.id = cd.model_id
                         JOIN
                     sales sd ON cd.id = sd.car_detail_id
                WHERE sd.status = 'completed'
                GROUP BY title
                ORDER BY title DESC;";

        return DB::select($sql);
    }

    public function getTotalSalesByStatus(): ?array
    {
        $sql = "SELECT status          As title,
                       COUNT(id)       AS value
                FROM sales
                GROUP BY title
                ORDER BY title;";

        return DB::select($sql);
    }
}
