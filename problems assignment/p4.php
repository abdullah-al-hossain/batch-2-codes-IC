<?php

$input = 5; 

for($i = 1; $i <= $input; $i++) {
    for($k = $input - $i; $k >= 0; $k--) {
        echo " ";
    }

    for($j = 1; $j <= $i; $j++) {
        echo "*";
    }

    echo PHP_EOL;
}