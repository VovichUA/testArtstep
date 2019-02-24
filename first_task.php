<?php


for ($i = 0; $i <= 100; $i++) {
    $number[$i] = rand(1, 10);
}
$count = array_count_values($number);
$result = (array_keys($count, max($count)));

 echo "Чаще всего повторяеться число $result[0]";