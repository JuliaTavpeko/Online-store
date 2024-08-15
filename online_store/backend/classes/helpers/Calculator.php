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

}