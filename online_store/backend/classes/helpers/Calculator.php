<?php

namespace backend\classes\helpers;

class Calculator
{

    public static function calculateItemPrice($item): float|int
    {
        if (isset($item['price']) && isset($item['quantity'])) {
            return $item['price'] * $item['quantity'];
        }
        return 0;
    }

    public static function calculateTotalPrice($items): float|int
    {
        $totalPrice = 0;

        foreach($items as $item){
            $totalPrice += self::calculateItemPrice($item);
        }
        return $totalPrice;
    }

    public static function calculateRating($items): float|int
    {
        $totalRating = 0;
        $count = count($items);

        if ($count === 0) {
            return 0;
        }

        foreach ($items as $item) {
            $totalRating += $item['rating'];
        }

        return ceil($totalRating / $count * 10) / 10;
    }
}