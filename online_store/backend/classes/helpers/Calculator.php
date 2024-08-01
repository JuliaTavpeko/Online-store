<?php

namespace backend\classes\helpers;

class Calculator
{

    public static function calculateItemPrice($item){

        return $item['price'] * $item['quantity'];
    }

    public static function calculateTotalPrice($items){
        $totalPrice = 0;

    }

    public static function calculateTotalQuantity (){
        $totalQuantity = 0;

    }

}