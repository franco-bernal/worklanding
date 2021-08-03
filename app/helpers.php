<?php

use Carbon\Carbon;

function todayDate($date)
{
    $max_date = Carbon::parse($date);

    $today = Carbon::now();
    if ($max_date->diff($today)->days == 0) {
        return "hoy - " . $date;
    }
    if ($max_date->diff($today)->days > 1) {
        return "ayer - ".$date;
    }

    return $date;
}
