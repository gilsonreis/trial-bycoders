<?php

namespace App\Enum\Sales;

enum SalesStatusEnum: string
{
    case CANCELED = 'canceled';
    case COMPLETED = 'completed';
    case IN_PROGRESS = 'in_progress';

    public static function formatValue(string $value): string
    {
        $statuses = [
            self::CANCELED->value => 'Canceled',
            self::COMPLETED->value => 'Completed',
            self::IN_PROGRESS->value => 'In Progress'
        ];

        return $statuses[$value];
    }
}

