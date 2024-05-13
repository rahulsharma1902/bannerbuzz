<?php

// // Change directory to where composer.json resides
// chdir(__DIR__);

// // Execute Composer command
// exec('/usr/bin/php8.1 /kunden/homepages/22/d795866109/htdocs/laravel/composer/composer install', $output, $returnCode);

// // Output result
// echo implode("\n", $output) . "\n";

// // Check return code
// if ($returnCode !== 0) {
//     echo "Composer command failed with return code: $returnCode\n";
//     exit(1);
// }

// echo "Composer command executed successfully.\n";
#!/usr/bin/env php

putenv('PHP_IDE_CONFIG=serverName=your_server_name');
putenv('COMPOSER_HOME=/home/your_user_name/.composer');
putenv('COMPOSER_CACHE_DIR=/home/your_user_name/.composer/cache');
putenv('COMPOSER_VENDOR_DIR=/home/your_user_name/vendor');

$args = $_SERVER['argv'];
unset($args[0]);

$php_bin = 'php8.1';
$composer_bin = '/kunden/homepages/22/d795866109/htdocs/laravel/composer/composer';

$cmd = "{$php_bin} {$composer_bin} " . implode(' ', $args);
passthru($cmd, $return_var);