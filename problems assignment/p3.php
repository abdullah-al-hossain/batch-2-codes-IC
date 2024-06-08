<?php


$sentence = "I love programming";
$explodedSentence = explode(" ", $sentence);

foreach ($explodedSentence as $key => $word) {
    echo strrev($word);

    if(count($explodedSentence) > $key + 1) {
        echo " ";
    }
}

echo PHP_EOL;