<?php

$number = 62343;
$result = 0;

do {
    $result += $number % 10;

    $number /= 10;
} while($number > 0);

echo $result.PHP_EOL;