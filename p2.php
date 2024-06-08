<?php

$paragraph = file_get_contents('hello.txt');

echo str_word_count($paragraph).PHP_EOL;