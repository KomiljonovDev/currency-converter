<?php

require 'Currency.php';

$currency = new Currency();

$currencies = $currency->getCurrencies();
print_r($currencies);


require 'views/currency-converter.php';

/*TODO
 * 1. Find an API
 * 2. Create a New file for usage API
 * 3. Write Class for usage APi
 * 4. CURL
 * 5. Echo
 *
 *
 */