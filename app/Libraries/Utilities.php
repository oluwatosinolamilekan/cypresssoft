<?php

namespace App\Libraries;

class Utilities
{
    /**
     * @return string
     */
    public static function generateToken(): string
    {
        $date = strtotime(date("Y-m-d H:i:s")) * 4;
        $reference = (integer)round((mt_rand(100000, 999999999).$date) / 199999999999);
        return $reference.uniqid();
    }
}
