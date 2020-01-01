<?php namespace App\Utilities\Time;

use Carbon\Carbon;

class TimeHelper
{
    public static function getNow(): string
    {
        return (string)Carbon::now();
    }
}
