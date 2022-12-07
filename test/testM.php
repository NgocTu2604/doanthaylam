<?php
function test($money)
{

    if ($money >= 100 && $money <= 200)
        return 'color: yellow !important';
    else if ($money > 20)
        return 'color: red !important';
    else
        return 'color: green !important';
}
 function formatPrice($m)
 {
    return number_format($m,2,'.','');
 }
