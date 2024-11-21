<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri == '/weather') {
    require 'resources/views/weather.php';
}elseif ($uri == '/currency') {
    require 'src/Currency.php';
    $currency = new Currency();
    require 'resources/views/currency-converter.php';
}elseif ($uri == '/telegram') {
    require 'app/bot.php';
} else{
    echo 404;
}