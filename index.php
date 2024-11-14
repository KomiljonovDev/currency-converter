<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


require 'src/Currency.php';

$currency = new Currency();

require 'resources/views/currency-converter.php';

/*TODO
 * 1. Find an API
 * 2. Create a New file for usage API
 * 3. Write Class for usage APi
 * 4. CURL
 * 5. Echo
 *
 *
 */