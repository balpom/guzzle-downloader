<?php

namespace Balpom\GuzzleDownloader;

require __DIR__ . "/../vendor/autoload.php";

$downloader = new Downloader();

$downloader = $downloader->get('https://ipmy.ru/ip');
$result = $downloader->result();
echo $result->code() . PHP_EOL;
echo $result->content() . PHP_EOL;
echo $result->mime() . PHP_EOL;

$downloader = $downloader->get('https://ipmy.ru/host');
$result = $downloader->result();
$html = $result->content();
echo $html . PHP_EOL;

sleep(3);

$result = $downloader->get('https://php.net/');
print_r($result->response());

