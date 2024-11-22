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
    echo '404 page yoq';
}


/*TODO
 * 1. Replace all the required autoload files with one
 * 2. Replace currency-converter view file to currency
 * 3. Move the required Weather class to the index file
 * 4. Remove the duplicated ini_set() functions
 * 5.
 */

