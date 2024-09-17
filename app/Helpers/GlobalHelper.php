<?php

use Carbon\Carbon;

// Func filter date
if (!function_exists('filterByDate')) {
    function filterByDate($data, $model, $column)
    {
        if ($data && isset($data['data'][0])) {
            $jsonString = $data['data'][0];
            $decodedData = json_decode($jsonString, true);
            $dateValue = collect($decodedData)->firstWhere('key', 'date')['value'] ?? null;

            if ($dateValue) {
                $dateStart = Carbon::parse($dateValue[0]);
                $dateEnd = Carbon::parse($dateValue[1])->endOfDay();

                return $model->whereBetween("{$column}", [$dateStart, $dateEnd]);
            }
        }

        return $model;
    }
    function filterByDateCondition($data, $field)
    {
        if ($data && isset($data['data'][0])) {
            $jsonString = $data['data'][0];
            $decodedData = json_decode($jsonString, true);
            $dateValue = collect($decodedData)->firstWhere('key', 'date')['value'] ?? null;

            if ($dateValue) {
                $dateStart = Carbon::parse($dateValue[0])->toDateString();
                $dateEnd = Carbon::parse($dateValue[1])->endOfDay()->toDateString();

                return "$field BETWEEN '$dateStart' AND '$dateEnd'";
            }
        }

        return '1=1'; // Không áp dụng điều kiện nếu không có ngày
    }
}
