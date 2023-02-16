<?php

function clockAngle($hours, $minutes)
{
    $hourAngle = 0.5 * (60 * $hours + $minutes);
    $minuteAngle = 6 * $minutes;
    $angle = abs($hourAngle - $minuteAngle);

    if ($angle > 180) {
        $angle = 360 - $angle;
    }

    return $angle;
}

echo clockAngle(3, 15);
