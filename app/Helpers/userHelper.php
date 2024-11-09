<?php
function calculatePriceWithDiscount($price, $discount)
{
    $discount = ($price * $discount) / 100;
    $afterDiscount = $price - $discount;
    return number_format($afterDiscount,2);
}
