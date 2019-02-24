<?php
require_once 'simple_html_dom.php';

$url = 'http://mp3party.net/pop-music/';

$data = file_get_html($url);

    if (count($data->find('div.name'))) {
        foreach ($data->find('div.name') as $value) {

            $topSongs[] = trim(strip_tags($value));
            $topSongs[] = "\n";
        }

        if (file_put_contents('nameOfSongs.txt', $topSongs)) {
            echo "Топ лучших песен записано в файл 'nameOfSong.txt'";
        } else {
            echo "Что-то пошло не так";
        }
    }