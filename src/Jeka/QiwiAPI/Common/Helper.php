<?php

namespace Jeka\QiwiAPI\Common;

class Helper
{
    public static function phoneToQiwiId($phone_number)
    {
        $phone_number = preg_replace('/[^\d]/', '', $phone_number);
        if (strlen($phone_number) > 10) {
            $phone_number = substr($phone_number, -10);
        }

        return $phone_number;
    }
}