<?php

namespace App\Discounts;

class TotalDiscount
{
    private $total;
    const DISCOUNT = 10;

    public function __construct($total) {
        $this->total = $total;
    }

    function getTenPercentDiscount() {
        $discountTotal = $this->total * (self::DISCOUNT / 100);
        $discountedPrice = $this->total - $discountTotal;

        return "You got a " . self::DISCOUNT . "% discount and saved " . $discountTotal . ". Your order will now cost " . $discountedPrice . ".";
    }
}