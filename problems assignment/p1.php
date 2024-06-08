<?php

$input = [10, 12, 15, 189, 22, 2, 34];
echo "Sample input 1:".PHP_EOL;
echo implode(" ", $input).PHP_EOL;


echo "Sample output 1:".PHP_EOL;
echo min_value_calculator($input).PHP_EOL;

$input2 = [10, -12, 34, 12, -3, 123];
echo "Sample input 2:".PHP_EOL;
echo implode(" ", $input2).PHP_EOL;


echo "Sample output 2:".PHP_EOL;
echo min_value_calculator($input2).PHP_EOL;

function min_value_calculator(array $input): int {
    $result = PHP_INT_MAX;
    foreach ($input as $value) {
        if(abs($value) < $result) {
            $result = abs($value);
        }
    }

    return $result;
} 