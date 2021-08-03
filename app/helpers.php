<?php

use Carbon\Carbon;

function todayDate($date)
{
    $max_date = Carbon::parse($date);

    $today = Carbon::now();
    if ($max_date->diff($today)->days == 0) {
        return "hoy";
    }
    if ($max_date->diff($today)->days > 1) {
        return "ayer";
    }

    return $date;
}
