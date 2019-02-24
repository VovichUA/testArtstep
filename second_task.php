<?php
$holidays = array('01-01','01-07','05-30','08-24');
$timeNow = date('G-i');
$tomorrow = date('d F',time() + 86400);
$afterTomorrow = date('d F',time() + 172800);
$afterAfterTomorrow = date('d F',time() + 259200);

echo 'Сейчас: '.date('d F G:i');
echo '<hr>';

if (($timeNow<'20-00') && !in_array(date('m-d', time()+86400),$holidays)){
    echo "Доставка будет ".$tomorrow;
} elseif (($timeNow>'20-00') && !in_array(date('m-d',time()+172800),$holidays)) {
    echo 'Доставка будет '.$afterTomorrow;
} elseif (($timeNow>'20-00') && in_array(date('m-d',time()+86400),$holidays)) {
    echo 'Доставка будет '.$afterTomorrow;
} else {
    echo 'Доставка будет '.date('d F',time() + 259200);
}