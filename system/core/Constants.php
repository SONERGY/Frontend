<?php
$isLive = true;
$whitelist = array(
    '127.0.0.1',
    '::1'
);

if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    $isLive = false;
}

if ($isLive) {
    define('API_SERVER', 'http://api.sonergy.io');
} else {
    define('API_SERVER', 'http://survey-api.com');
}
define('STATIC_VERSION', "0.0.26");
define('SITE_DOMAIN_NAME', "sonergy.io");
