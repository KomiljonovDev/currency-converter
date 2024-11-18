<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require 'src/Currency.php';

$currency = new Currency();

require 'resources/views/currency-converter.php';
